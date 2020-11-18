<template>
<app>
<v-main>
    <v-container>Hello world</v-container>

    <v-alert
      border="right"
      color="primary"
    >
      I'm an alert with a bottom border and pink color
    </v-alert>

    <template>
  <v-card>
    <v-tabs
      background-color="deep-purple accent-4"
      center-active
      dark
    >
      <v-tab>One</v-tab>
      <v-tab>Two</v-tab>
      <v-tab>Three</v-tab>
      <v-tab>Four</v-tab>
      <v-tab>Five</v-tab>
      <v-tab>Six</v-tab>
      <v-tab>Seven</v-tab>
      <v-tab>Eight</v-tab>
      <v-tab>Nine</v-tab>
      <v-tab>Ten</v-tab>
      <v-tab>Eleven</v-tab>
      <v-tab>Twelve</v-tab>
      <v-tab>Thirteen</v-tab>
      <v-tab>Fourteen</v-tab>
      <v-tab>Fifteen</v-tab>
      <v-tab>Sixteen</v-tab>
      <v-tab>Seventeen</v-tab>
      <v-tab>Eighteen</v-tab>
      <v-tab>Nineteen</v-tab>
      <v-tab>Twenty</v-tab>
    </v-tabs>
  </v-card>
</template>
</v-main>
</app>
</template>

<script>
import App from '@/Pages/Layouts/App.vue';

export default {
    components: {
        app: App
    }
}
</script>
