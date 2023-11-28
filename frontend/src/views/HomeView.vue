<template>
  <form @submit.prevent="search">
    <input
      v-model="userSearch"
      type="text"
      placeholder="Search"
    >
    <button type="submit">
      Buscar
    </button>
  </form>
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
        v-for="(user, index) in users.dt.data"
        :key="index"
      >
        <th scope="row">
          {{ user.id }}
        </th>
        <td>{{ user.firstName }}</td>
        <td>{{ user.lastName }}</td>
        <td>{{ user.email }}</td>
      </tr>
      <tr v-if="users.dt.data?.length < 0">
        <td
          colspan="4"
          class="text-center"
        >
          Nenhum usuário encontrado.
        </td>
      </tr>
    </tbody>
  </table>
  <Bootstrap5Pagination
    :data="users.dt"
    :limit="2"
    align="center"
    @pagination-change-page="handleEventPagination"
  />
</template>
<script setup>
import http from '@/services/http.js';
import { onMounted, ref, reactive } from 'vue';
import _ from 'lodash';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
const users = reactive({dt:[]});

const userSearch = ref('');
let searched = ref(true);

onMounted(async ()=> {
    try {
        const {data} = await http.get('api/users');
        users.dt = data;
    
    } catch (error) {
        console.log(error.response.data);
    }
});

async function getUsers(page = 1){
    try {
        const {data} = await http.get('api/users?page='+Number(page), {
            params:{
                user:userSearch.value
            }
        });

        users.dt = data;
    } catch (error) {
        console.log(error.response.data);
    }
}

function handleEventPagination(page) {
    return userSearch.value ? searchUser(page) : getUsers(page);
}

async function searchUser(page = 1){
    try {
        const {data} = await http.get('api/users/search?page='+Number(page), {
            params:{
                user:userSearch.value
            }
        });

        
        if (!userSearch.value) {
            searched.value = false;
            getUsers();
        } else {
            searched.value = true;
            users.dt = data;
        }

    } catch (error) {
        console.log(error.response.data);
    }
}
async function search() {
    try {
        const {data} = await http.get('api/users/search', {
            params:{
                user:userSearch.value
            }
        });

        users.dt = data;
    } catch (error) {
        console.log(error.response.data);
    }
}
</script>

