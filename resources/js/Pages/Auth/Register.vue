<script setup>
//import { reactive } from 'vue'; // we can remove this we dont need it anymore
//import {router} from '@inertiajs/vue3' // this is the vue method into passing form data first need to import this
import { useForm } from "@inertiajs/vue3"; //this is the 2nd method of passing form data
import TextInput from "../Components/TextInput.vue";

const form = useForm({
    //instead of reactive useform then do form things  useForm turn it into reactive
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    avatar: null,
    preview:null,
});

const change = (e) => {
    form.avatar = e.target.files[0]; /* listening an e event and get the file details to pass on form avatar for use.form to be submited */
    form.preview = URL.createObjectURL(e.target.files[0]);
    };
const submit = () => {
    //router.post('/register',form) //this will use the router import to uri /register with the data from form
    form.post(route("register"), {
        // due to useform import we dont need the payload data //you can use route() instead hardcoded uri
        onError: () => form.reset("password", "password_confirmation"), //will reset form data of password and pass_confirm leave the others alone
    });
};
</script>

<template>
    <Head title="Register" />
    <!--  <div>Register</div> -->
    <h1 class="title">Register a new Account</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <!-- inertia will be responsible for passing data no action no method -->
            <!-- from will call submit function  -->
            <!-- upload avatar -->
            <div class="grid place-items-center">
        <div class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300">
            <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
                <span class="bg-white/70 pb-2 text-center">Avatar</span>
            </label>
            <input type="file" @input="change" id="avatar" hidden>
            <img class="object-cover w-28 h-28" :src="form.preview ?? 'storage/avatars/default.png'"/>
        </div>
        <p class="error mt-2">{{ error }}</p>
    </div>

            <TextInput
                name="name"
                v-model="form.name"
                :message="form.errors.name"
            />
            <TextInput
                name="email"
                type="email"
                v-model="form.email"
                :message="form.errors.email"
            />
            <TextInput
                name="password"
                type="password"
                v-model="form.password"
                :message="form.errors.password"
            />
            <TextInput
                name="confirm password"
                type="password"
                v-model="form.password_confirmation"
            />
            <div>
                <p class="text-slate-600 mb-2">
                    Already a User?
                    <a :href="route('login')" class="text-link">Login</a>
                </p>
                <button class="primary-btn" :disabled="form.processing">
                    Register
                </button>
                <!-- will disable if processing in progress this can help spam protection -->
            </div>
        </form>
    </div>
</template>
