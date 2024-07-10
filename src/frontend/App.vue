<template>
  <button @click.prevent="clickMe">Click me</button>
</template>

<script setup>

const clickMe = () => {
  console.log('click');
}
</script>