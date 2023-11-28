<template>
  <form
    action=""
    @submit.prevent="create"
  >
    <input
      v-model="user.firstName"
      type="text"
      placeholder="first Name"
    >
    <span
      v-if="errors.data.firstName"
      class="error"
    >{{ errors.data.firstName[0] }}</span>
    <input
      v-model="user.lastName"
      type="text"
      placeholder="last Name"
    >
    <span
      v-if="errors.data.lastName"
      class="error"
    >{{ errors.data.lastName[0] }}</span>
    <input
      v-model="user.email"
      type="text"
      placeholder="Email"
    >
    <span
      v-if="errors.data.email"
      class="error"
    >{{ errors.data.email[0] }}</span>
    <input
      v-model="user.password"
      type="password"
      placeholder="Password"
    >
    <span
      v-if="errors.data.password"
      class="error"
    >{{ errors.data.password[0] }}</span>
    <button type="submit">
      Cadastrar
    </button>
  </form>
</template>

<script setup>

import http from '@/services/http.js';
import { reactive } from 'vue';

const user = reactive({});
const errors = reactive({data:[]});

async function create() {
    try {
        const {data} = await http.post('api/user', user);
        console.log(data);
    } catch (e) {
        console.log(e.response.data);
        if (e.response?.data) {

            errors.data = e.response.data['errors'];
        }
    }
}
</script>
<style>
.error {
  color: red;
}
</style>