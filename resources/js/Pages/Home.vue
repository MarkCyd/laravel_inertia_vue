<script setup></script>
<template>
    <!--  <h1>{{ $page.props.auth.user }}</h1>  so non auth can get that data its good for log in greating -->
    <!--  <Link class="mt-[1200px] block" href="/" preserve-scroll>Refresh</Link>  if preserve-scroll is present it will not go back to top  -->
    <Head :title="$page.component" /> <!-- adding: to title will turn it into a dynamic from static page -->
    <h1>Home Page</h1>
</template>
