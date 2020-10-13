<template>
<div>
    <div align="center" v-if="state">{{ state }}</div>
  <p align='center'>We have email you a verification link. <inertia-link href="/email/verification-notification" method="post">Resend</inertia-link></p>
</div>
</template>

<script>
export default {
    props: ['state']
}
</script>

<style>

</style>
