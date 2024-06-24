<script setup> /* this will accept data from route web.php with the key user */
    defineProps({
        user: String
    })
</script>

<template>
<div>
    <h1>About View {{ user }}</h1>
</div>    
</template>
