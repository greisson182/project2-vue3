<template>
  Likes: {{ likes }}
  Comments: {{ comments }}

  <button @click="add">
    Add
  </button>
</template>

<script setup>

defineProps(['likes', 'comments']);

const emit = defineEmits(['addProduct']);

function add() {
    emit('addProduct', 10);
}

</script>