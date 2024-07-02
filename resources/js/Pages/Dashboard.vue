<template>
    <div>
      <p class="p-4 bg-green-200">{{ $page.props.flash.greet }}</p> <!-- greet came from authcontroller flash is handlerinertiarequest -->
      <h1 class="title">Welcome Back {{ $page.props.auth.user.name }}</h1>  
    </div>
</template>