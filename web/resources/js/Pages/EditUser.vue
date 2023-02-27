<template>
    <Menu :user="user" :title="title">
<div>
    <div class="container-fluid">
    <h1 style="font-weight:bold;text-align: center;">Usuário #{{ user_edits.id }}</h1><br>
    <form>
        <div class="form-row">
            <div class="col-md-5">
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationServer01">Nome</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="Nome" disabled v-model="user_edits.first_name">
            </div>
            <div class="col-md-5">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5">
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationServer01">Sobrenome</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="Sobrenome" disabled v-model="user_edits.last_name">
            </div>
            <div class="col-md-5">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5">
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationServer01">E-mail</label>
                <input type="email" class="form-control" id="validationServer01" placeholder="" v-model="form.email">
            </div>
            <div class="col-md-5">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5">
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationServer01">Senha</label>
                <input type="password" class="form-control" id="validationServer01" placeholder="" v-model="form.password">
            </div>
            <div class="col-md-5">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5">
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationServer01">Tipo</label>
                <select class="form-select form-control" aria-label="Default select example" v-model="form.type">
                    <option value="1">Usuário</option>
                    <option value="90">Admin</option>
                </select>
            </div>
            <div class="col-md-5">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5">
            </div>
            <div class="col-md-5">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5">
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationServer01">Status</label>
                <select class="form-select form-control" aria-label="Default select example" v-model="form.status">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </div>
            
            <div class="col-md-5">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5">
            </div>
            <div class="col-md-sm mb-3">
                <button class="btn btn-primary" type="submit" @click="handleForm()">Atualizar</button>
            </div>
            <div class="col-md-5">
            </div>
        </div>
</form>
</div>
</div>
</Menu>
</template>
<script>

import Menu from '../layout/Menu.vue';
export default {
  components:{
    Menu
  },
  props: [
        'title',
        'user',
        'user_edits',
    ],
    data() {
    return {
        form: {
            'type': this.user_edits.type,
            'email': this.user_edits.email,
            'password': this.user_edits.password,
            'status': this.user_edits.status,
        },
      count: 0
    }
  },
  methods: {
        handleForm() {
            let exeption_list = [
            'type',
            'email',
            'password',
            'status',
            ]
            for(let campo in this.form){
                if(this.form[campo] == null ){
                    return 0
                }
            }
            this.$inertia.post('/usuario/'+this.user_edits.id+'/editar', this.form)
        }
    }
}
</script>
