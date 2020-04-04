<template>
  <div class="box">
    <h1>Login</h1>
    <form @submit.prevent="validateAccount">
      <AppInput v-model="usernameVal" placeholder="Username" />
      <AppPassword v-model="passwordVal" placeholder="Password" />
      <AppButton type="submit" buttonClass="-fill-gradient">login</AppButton>
    </form>
  </div>
</template>

<script>
import AppInput from "@/components/AppInput";
import AppPassword from "@/components/AppPassword.vue";
import AppButton from "@/components/AppButton.vue";

export default {
  components: {
    AppInput,
    AppPassword,
    AppButton
  },
  data() {
    return {
      usernameVal: "",
      passwordVal: ""
    };
  },
  methods: {
    validateAccount() {
      // String.trim() is necessary
      alert(this.usernameVal + ", " + this.passwordVal);
    }
  }
};
</script>

<style scoped>
.box {
  width: 360px;
  height: auto;
  margin: 0 auto;
  padding: 20px 0 20px;
  background: #00ffff;
}

h1 {
  display: block;
  text-align: center;
  color: #777;
  margin-bottom: 20px;
}
</style>
