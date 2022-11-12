<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>
  <div>
    <div class="p-6 pt-12 sm:px-20 bg-white border-b border-gray-200">
      <div style="margin-left: -40px;">
        <ApplicationLogo class="block w-auto" />
      </div>

      <div class="mt-8 text-2xl">
        Welcome to ByteeStudio autocomplete REST API!
      </div>

      <div class="mt-6 text-gray-500">
        ByteeStudio Autocomplete is a fast and comprehensive JSON-based
        autocomplete/autosuggestion API, containing over 500k English words.
        This API is designed to be fast, simple and easy to intergrate with any
        client. All requests are made to endpoints beginning:
        <span class="underline"> https://json.byteestudio.com/api/v1</span>,
        <code><i> https </i> </code> is compulsory.
      </div>
    </div>

    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
      <div class="p-6">
        <div class="flex items-center">
          <font-awesome-icon
            class="w-8 h-8 text-gray-400"
            icon="fa-solid fa-bolt"
          />
          <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
            <a href="https://documenter.getpostman.com/view/17299530/2s8YerPCfo">Quick Start</a>
          </div>
        </div>

        <div class="ml-12">
          <div class="mt-2 text-sm text-gray-500 overflow-hidden flex-wrap text-ellipsis">
            All API calls are authenticated using a secret key.
            <code class="bg-gray-300"
              >curl https://json.byteestudio.com/api/v1/autocomplete/arch -H "Authorization:
              Bearer SECRET_KEY" -H "Content-Type: application/json"</code
            >
          </div>

          <a href="https://documenter.getpostman.com/view/17299530/2s8YerPCfo">
            <div
              class="
                mt-3
                flex
                items-center
                text-sm
                font-semibold
                text-indigo-500
              "
            >
              <div>Get Started</div>

              <div class="ml-1 text-indigo-500">
                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                  <path
                    fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
          <font-awesome-icon
            class="w-8 h-8 text-gray-400"
            icon="fa-solid fa-file-lines"
          />

          <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
            <a href="https://documenter.getpostman.com/view/17299530/2s8YerPCfo">Documentation</a>
          </div>
        </div>

        <div class="ml-12">
          <div class="mt-2 text-sm text-gray-500 overflow-hidden flex-wrap text-ellipsis">
            Explore all demos here, https://documenter.getpostman.com/view/17299530/2s8YerPCfo
          </div>

          <a href="https://documenter.getpostman.com/view/17299530/2s8YerPCfo">
            <div
              class="
                mt-3
                flex
                items-center
                text-sm
                font-semibold
                text-indigo-500
              "
            >
              <div>Explore the documentation</div>

              <div class="ml-1 text-indigo-500">
                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                  <path
                    fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
            </div>
          </a>
        </div>
      </div>
      <!-- 
            <div class="pt-12 pb-6 px-6 border-t border-gray-200 md:border-l">
                <div class="flex items-center">
                    
                    <svg
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5"
                        viewBox="0 0 24 24"
                        class="w-8 h-8 text-gray-400"
                    >
                        <path
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                        />
                    </svg>
                    <div
                        class="ml-4 text-lg text-gray-600 leading-7 font-semibold"
                    >
                        Authentication
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Authentication and registration views are included with
                        Laravel Jetstream, as well as support for user email
                        verification and resetting forgotten passwords. So,
                        you're free to get started what matters most: building
                        your application.
                    </div>
                </div>
            </div> 
            <div class="p-6 border-t border-gray-200">
                <div class="flex items-center">
                     <svg
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        class="w-8 h-8 text-gray-400"
                    >
                        <path
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                        />
                    </svg>
                    <div
                        class="ml-4 text-lg text-gray-600 leading-7 font-semibold"
                    >
                        <a href="https://tailwindcss.com/">Tailwind</a>
                    </div>
                </div>

                <div class="ml-12">
                 <div class="mt-2 text-sm text-gray-500">
                        Laravel Jetstream is built with Tailwind, an amazing
                        utility first CSS framework that doesn't get in your
                        way. You'll be amazed how easily you can build and
                        maintain fresh, modern designs with this wonderful
                        framework at your fingertips.
                    </div>
                </div>
            </div> -->
    </div>
  </div>
</template>
