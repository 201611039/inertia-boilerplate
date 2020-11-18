<template>
  <!-- <div>

        <div class="container">
            <div v-if="$page.props.flash.message" class="notification is-primary">
                {{ $page.props.flash.message }}
            </div>

            <slot></slot>
        </div>
  </div> -->

  <!-- App.vue -->

<v-app>
  <v-app-bar app>

  </v-app-bar>

  <!-- Sizes your content based upon application components -->
  <v-main>

    <!-- Provides the application the proper gutter -->
    <v-container class="mt-5">

      <!-- If using vue-router -->
      <slot></slot>
    </v-container>
  </v-main>

  <v-footer app>
    <!-- -->
  </v-footer>
</v-app>
</template>

<script>
  export default {
      props: [
          'auth'
      ],

      data() {
        return {

        }
      }
  }
</script>

