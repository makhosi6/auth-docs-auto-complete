<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import ActionSection from "@/Components/ActionSection.vue";
import Checkbox from "@/Components/Checkbox.vue";
import ConfirmationModal from "@/Components/ConfirmationModal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import WarnButton from "@/Components/WarnButton.vue";
import DialogModal from "@/Components/DialogModal.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
  tokens: Array,
  availablePermissions: Array,
  defaultPermissions: Array,
});

const createApiTokenForm = useForm({
  name: "",
  permissions: props.defaultPermissions,
});

const updateApiTokenForm = useForm({
  permissions: [],
});

const deleteApiTokenForm = useForm();

const displayingToken = ref(false);
const managingPermissionsFor = ref(null);
const apiTokenBeingDeleted = ref(null);

//
const apitokenMaxReached = ref(false);
//
const createApiToken = () => {
  //
  if (props.tokens.length > 1) {
    //
    try {
      gtag("event", "bs_reached_token_max");
    } catch (error) {
      console.log(error);
    }
    apitokenMaxReached.value = true;
    createApiTokenForm.reset();

    return;
  }
  createApiTokenForm.post(route("api-tokens.store"), {
    preserveScroll: true,
    onSuccess: () => {
      displayingToken.value = true;
      createApiTokenForm.reset();
      //
      try {
        gtag("event", "bs_create_token");
      } catch (error) {
        console.log(error);
      }
    },
  });
};

const manageApiTokenPermissions = (token) => {
  updateApiTokenForm.permissions = token.abilities;
  managingPermissionsFor.value = token;
};

const updateApiToken = () => {
  updateApiTokenForm.put(route("api-tokens.update", managingPermissionsFor.value), {
    preserveScroll: true,
    preserveState: true,
    onSuccess: () => (managingPermissionsFor.value = null),
  });
};

const confirmApiTokenDeletion = (token) => {
  apiTokenBeingDeleted.value = token;
};

const deleteApiToken = () => {
  deleteApiTokenForm.delete(route("api-tokens.destroy", apiTokenBeingDeleted.value), {
    preserveScroll: true,
    preserveState: true,
    onSuccess: () => (apiTokenBeingDeleted.value = null),
  });

  ///
  //
  try {
    gtag("event", "bs_detele_token");
  } catch (error) {
    console.log(error);
  }
};
</script>

<template>
  <div>
    <!-- Generate API Token -->
    <FormSection @submitted="createApiToken">
      <template #title> Create API Token </template>

      <template #description>
        API tokens allow third-party services to authenticate with our application on your
        behalf.
      </template>

      <template #form>
        <!-- Token Name -->
        <div class="col-span-6 sm:col-span-4">
          <InputLabel for="name" value="Name" />
          <TextInput
            id="name"
            v-model="createApiTokenForm.name"
            type="text"
            class="mt-1 block w-full"
            autofocus
          />
          <InputError :message="createApiTokenForm.errors.name" class="mt-2" />
        </div>

        <!-- Token Permissions -->
        <div v-if="availablePermissions.length > 0" class="col-span-6">
          <InputLabel for="permissions" value="Permissions" />

          <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div
              :title="permission != 'read' ? 'disabled' : ''"
              v-for="permission in availablePermissions"
              :key="permission"
            >
              <label class="flex items-center">
                <Checkbox
                  v-model:checked="createApiTokenForm.permissions"
                  :checked="permission != 'read' ? true : false"
                  :disabled="permission != 'read' ? true : false"
                  :value="permission"
                />
                <span
                  class="ml-2 text-sm"
                  :class="permission != 'read' ? 'text-gray-300' : 'text-gray-600'"
                  >{{ permission }}</span
                >
              </label>
            </div>
          </div>
        </div>
      </template>

      <template #actions>
        <ActionMessage :on="createApiTokenForm.recentlySuccessful" class="mr-3">
          Created.
        </ActionMessage>

        <PrimaryButton
          :class="{ 'opacity-25': createApiTokenForm.processing }"
          :disabled="createApiTokenForm.processing"
        >
          Create
        </PrimaryButton>
      </template>
    </FormSection>

    <div v-if="tokens.length > 0">
      <SectionBorder />

      <!-- Manage API Tokens -->
      <div class="mt-10 sm:mt-0">
        <ActionSection>
          <template #title> Manage API Tokens </template>

          <template #description>
            You may delete any of your existing tokens if they are no longer needed.
          </template>

          <!-- API Token List -->
          <template #content>
            <div class="space-y-6">
              <div
                v-for="token in tokens"
                :key="token.id"
                class="flex items-center justify-between"
              >
                <div>
                  {{ token.name }}
                </div>

                <div class="flex items-center">
                  <div v-if="token.last_used_ago" class="text-sm text-gray-400">
                    Last used {{ token.last_used_ago }}
                  </div>

                  <button
                    v-if="availablePermissions.length > 0"
                    class="cursor-pointer ml-6 text-sm text-gray-400 underline"
                    @click="manageApiTokenPermissions(token)"
                  >
                    Permissions
                  </button>

                  <button
                    class="cursor-pointer ml-6 text-sm text-red-500"
                    @click="confirmApiTokenDeletion(token)"
                  >
                    Delete
                  </button>
                </div>
              </div>
            </div>
          </template>
        </ActionSection>
      </div>
    </div>

    <!-- Token Value Modal -->
    <DialogModal :show="displayingToken" @close="displayingToken = false">
      <template #title> API Token </template>

      <template #content>
        <div>
          Please copy your new API token. For your security, it won't be shown again.
        </div>

        <div
          v-if="$page.props.jetstream.flash.token"
          class="mt-4 bg-gray-100 px-4 py-2 rounded font-mono text-sm text-gray-500"
        >
          {{ $page.props.jetstream.flash.token }}
        </div>
      </template>

      <template #footer>
        <SecondaryButton @click="displayingToken = false"> Close </SecondaryButton>
      </template>
    </DialogModal>

    <!-- Token Max Reached Modal -->
    <DialogModal :show="apitokenMaxReached" @close="apitokenMaxReached = false">
      <template #title> Oops! </template>

      <template #content>
        <div>Maximum of two tokens has been reached.</div>
      </template>

      <template #footer>
        <WarnButton @click="apitokenMaxReached = false"> Okay </WarnButton>
      </template>
    </DialogModal>

    <!-- API Token Permissions Modal -->
    <DialogModal
      :show="managingPermissionsFor != null"
      @close="managingPermissionsFor = null"
    >
      <template #title> API Token Permissions </template>

      <template #content>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div v-for="permission in availablePermissions" :key="permission">
            <label class="flex items-center">
              <Checkbox
                v-model:checked="updateApiTokenForm.permissions"
                :checked="permission != 'read' ? true : false"
                :disabled="permission != 'read' ? true : false"
                :value="permission"
              />
              <span
                class="ml-2 text-sm"
                :class="permission != 'read' ? 'text-gray-300' : 'text-gray-600'"
                >{{ permission }}</span
              >
            </label>
          </div>
        </div>
      </template>

      <template #footer>
        <SecondaryButton @click="managingPermissionsFor = null"> Cancel </SecondaryButton>

        <PrimaryButton
          class="ml-3"
          :class="{ 'opacity-25': updateApiTokenForm.processing }"
          :disabled="updateApiTokenForm.processing"
          @click="updateApiToken"
        >
          Save
        </PrimaryButton>
      </template>
    </DialogModal>

    <!-- Delete Token Confirmation Modal -->
    <ConfirmationModal
      :show="apiTokenBeingDeleted != null"
      @close="apiTokenBeingDeleted = null"
    >
      <template #title> Delete API Token </template>

      <template #content>
        Are you sure you would like to delete this API token?
      </template>

      <template #footer>
        <SecondaryButton @click="apiTokenBeingDeleted = null"> Cancel </SecondaryButton>

        <DangerButton
          class="ml-3"
          :class="{ 'opacity-25': deleteApiTokenForm.processing }"
          :disabled="deleteApiTokenForm.processing"
          @click="deleteApiToken"
        >
          Delete
        </DangerButton>
      </template>
    </ConfirmationModal>
  </div>
</template>
