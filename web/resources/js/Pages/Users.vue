<template>
<Menu :user="user" :title="title">
    <div class="container-fluid">
            <div class="table-responsive">
                <h1 style="font-weight:bold;text-align: center;">Usuários Cadastrados</h1><br>
            <table class="table" style="background-color: white;">
            <thead>
                <tr>
                <th scope="col-mb-1 col-sm-1">#</th>
                <th scope="col-mb-2 col-sm-1">Cliente</th>
                <th scope="col-mb-2 col-sm-1">Tipo</th>
                <th scope="col-mb-2 col-sm-1">Email</th>
                <th scope="col-mb-2 col-sm-1">Data Criação</th>
                <th scope="col-mb-2 col-sm-1">Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in all_users">
                <td scope="col-mb-1 col-sm-1">{{ user.id }}</td>
                <td scope="col-mb-1 col-sm-1">{{ user.first_name }} {{ user.last_name }}</td>
                <td scope="col-mb-1 col-sm-1">
                    <span  v-if="user.type == 1">Usuário</span>
                    <span  v-if="user.type == 90">Admin</span>
                    <span v-if="user.type == 99">Master</span>
                </td>
                <td scope="col-mb-1 col-sm-1">{{ user.email }}</td>
                <td scope="col-mb-1 col-sm-1">{{ user.data_criacao }}</td>
                <td scope="col-mb-1 col-sm-1">
                    <a :href="'/usuario/'+user.id+'/editar'" type="button" class="btn btn-primary btn-sm">
                        View
                    </a>
                </td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</Menu>
</template>
<script>
import Menu from '../layout/Menu.vue'

export default {
  components:{
    Menu
  },
  props: [
        'title',
        'user',
        'all_users'
    ],
    data() {
    return {
      count: 0
    }
  },
  methods: {

}
}
</script>
