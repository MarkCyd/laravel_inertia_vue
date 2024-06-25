<script setup></script>

<template>
   
    <div>
        <header >
            <nav>
                <div class="space-x-6">
                    <Link :href="route('home')" class="nav-link">Home</Link> <!-- :href to make it dynamic -->
                </div>
                <div class="space-x-6">
                     <Link :href="route('register')" class="nav-link">Register</Link> <!-- :href to make it dynamic -->
                </div>
            </nav>
        </header>
        <main class="p-4">
            <slot />
        </main>
    </div>
</template>