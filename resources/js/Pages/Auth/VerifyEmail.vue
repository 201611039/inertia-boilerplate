<template>
<div>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="alert mt-3 alert-success" v-if="state">{{ state }}</div>
            <div class="card mt-5">
                <div class="card-body">
                    <p align='center'>We have email you a verification link. <inertia-link href="/email/verification-notification" method="post">Resend</inertia-link></p>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['state']
}
</script>

<style>

</style>
