<script setup>
import { ref, watch } from "vue";
import PaginationLinks from "./Components/PaginationLinks.vue"
import {router} from "@inertiajs/vue3";
/* import { throttle } from "lodash"; */ //as you type only submit on the value of delay
import { debounce } from "lodash"; //send only when you stop


const props = defineProps({
    users: Object, //users not user
    searchTerm: String
});
//formate date
const getDate = (date)=>
    new Date(date).toLocaleDateString("en-us",{
        year: "numeric",
        month: "long",
        day: "numeric",
    });

const search = ref(props.searchTerm);

watch(
  search,
  debounce((q) => router.get("/", { search: q }, { preserveState: true }), 500)
);

</script>
<template>
    <!--  <h1>{{ $page.props.auth.user }}</h1>  so non auth can get that data its good for log in greating -->
    <!--  <Link class="mt-[1200px] block" href="/" preserve-scroll>Refresh</Link>  if preserve-scroll is present it will not go back to top  -->

    <Head :title="$page.component" /> <!-- adding: to title will turn it into a dynamic from static page -->
     <div>
        <div class="flex justify-end mb-4">
            <div class="w-1/4">
                <input type="search" placeholder="Search" v-model="search">
            </div>
        </div>
        <table>
            <thead>
                <tr class="bg-slate-300">
                    <th>avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="user in users.data" :key="user.id">
                    <td>
                        <img :src="user.avatar ? ('storage/' + user.avatar) :'storage/avatars/default.png'" class="avatar" />
                    </td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ getDate(user.created_at) }}</td>
                </tr>
            </tbody>
        </table>

        <!-- pagination links -->
        <div>
            <PaginationLinks :paginator="users"/>
        </div>
    </div>
</template>
