<template>
    <Menu :user="user" :title="title">
<div>
    <div class="container-fluid">

    <h1 style="font-weight:bold;text-align: center;">Cadastro de Usuário</h1><br>
    <form>
        <div class="form-row">
            <div class="col-md-5">
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationServer01">Nome</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="Nome" required v-model="form.first_name">
            </div>
            <div class="col-md-5">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5">
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationServer01">Sobrenome</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="Sobrenome" required v-model="form.last_name">
            </div>
            <div class="col-md-5">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5">
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationServer01">E-mail</label>
                <input type="email" class="form-control" id="validationServer01" placeholder="" required v-model="form.email">
            </div>
            <div class="col-md-5">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5">
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationServer01">Senha</label>
                <input type="password" class="form-control" id="validationServer01" placeholder="" required v-model="form.password">
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
                    <option selected value="1">Usuário</option>
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
            <div class="col-md-sm mb-3">
                <button class="btn btn-primary" type="submit" @click="handleForm()">Cadastrar</button>
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
  props: ['title','user'],
    data() {
    return {
        form: {
            'first_name': null,
            'last_name': null,
            'type': 1,
            'email': null,
            'password': null,
        },
      count: 0
    }
  },
  methods: {
        handleForm() {
            for(let campo in this.form){
                if(this.form[campo] == null ){
                    return 0
                }
            }
            this.$inertia.post('/usuario/criar', this.form)
            this.form.content = ""
        }
    }
}
</script>
