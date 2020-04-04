<template>
  <div class="box">
    <h1>Sign Up</h1>
    <form @submit.prevent="sendData">
      <AppInput
        label="Username:"
        v-model="usernameVal"
        placeholder="Username"
      />
      <AppPassword
        label="Password:"
        v-model="passwordVal"
        placeholder="Password"
      />
      <AppPassword
        label="Confirm Password:"
        v-model="confirmedPassVal"
        placeholder="Password"
      />
      <AppButton type="submit" buttonClass="-fill-gradient">sign up</AppButton>
    </form>
  </div>
</template>

<script>
// @ is an alias to /src
import AppInput from "@/components/AppInput";
import AppPassword from "@/components/AppPassword.vue";
import AppButton from "@/components/AppButton.vue";
import EventService from "@/services/EventService.js";

export default {
  components: {
    AppInput,
    AppPassword,
    AppButton
  },
  data() {
    return {
      usernameVal: "",
      passwordVal: "",
      confirmedPassVal: ""
    };
  },
  methods: {
    sendData() {
      // String.trim() is necessary
      EventService.sendAccountInfo(
        this.usernameVal.trim(),
        this.passwordVal.trim()
      )
        .then(response => {
          alert(response.data);
        })
        .catch(error => {
          alert(error);
        });

      this.usernameVal = "";
      this.passwordVal = "";
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
