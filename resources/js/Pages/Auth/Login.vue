<script setup>
//import { reactive } from 'vue'; // we can remove this we dont need it anymore 
//import {router} from '@inertiajs/vue3' // this is the vue method into passing form data first need to import this
import { useForm } from '@inertiajs/vue3'; //this is the 2nd method of passing form data
import TextInput from '../Components/TextInput.vue';

const form = useForm   ({  //dont need name and password confirmation
     
        email:null,
        password:null,
        remember:null,     
    });
    const submit = ()=>{
        //router.post('/register',form) //this will use the router import to uri /register with the data from form
        form.post(route('login'),{          // due to useform import we dont need the payload data //you can use route() instead hardcoded uri
            onError:()=> form.reset("password","remember"), //will reset form data of password and pass_confirm leave the others alone 
        }); 
    };
</script>

<template>
    <Head title="Login"/>
   <!--  <div>Register</div> -->
    <h1 class="title">Login to your Account</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit"> <!-- inertia will be responsible for passing data no action no method -->
                                        <!-- from will call submit function  -->
        <TextInput name="email" type="email" v-model="form.email" :message="form.errors.email"/>
        <TextInput name="password" type="password" v-model="form.password" :message="form.errors.password"/>
        <div class="flex item-center justify-between mb-2">
        <div class="flex item-center gap-2 ">
            <input type="checkbox" v-model="form.remember" id="remember"/>
            <label for="remember">Remember Me</label>
            
        </div>    
            <p class="text-slate-600 ">Need an Account? <a :href="route('register')" class="text-link">Login</a></p>
        </div> 
        <div>
                <button class="primary-btn" :disabled="form.processing">Login</button> <!-- will disable if processing in progress this can help spam protection -->
        </div>
        </form>

    </div>
</template>