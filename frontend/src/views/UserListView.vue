<template>
  <h2>Lista de Usuários</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">
          #
        </th>
        <th scope="col">
          First
        </th>
        <th scope="col">
          Last
        </th>
        <th scope="col">
          Email
        </th>
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="user in users.users"
        :key="user.id"
      >
        <th scope="row">
          {{ user.id }}
        </th>
        <td>{{ user.firstName }}</td>
        <td>{{ user.lastName }}</td>
        <td>{{ user.email }}</td>
      </tr>
    </tbody>
  </table>
</template>
<script setup>

import { onMounted, reactive } from 'vue';

import http from '@/services/http';

let users = reactive({users:[]});

onMounted(async ()=> {
    try {
        const {data} = await http.get('api/users');

        users.users = data;
    } catch (error) {
        console.log(error);
    }
});


</script>