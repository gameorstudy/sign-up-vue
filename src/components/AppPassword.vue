<template>
  <div class="field">
    <label v-if="label" for="password">{{ label }}</label>
    <input
      :type="inputType"
      id="password"
      :value="value"
      v-bind="$attrs"
      v-on="listeners"
    />
    <img :src="eye_icon" alt="" v-on="listenersIcon" />
  </div>
</template>

<script>
import eye_on from "../assets/eye_on.png";
import eye_off from "../assets/eye_off.png";

export default {
  inheritAttrs: false,
  props: {
    label: {
      type: String,
      default: ""
    },
    value: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      inputType: "password",
      eye_icon: eye_off
    };
  },
  computed: {
    listeners() {
      return {
        ...this.$listeners,
        input: this.updateValue
      };
    },
    listenersIcon() {
      return {
        ...this.$listeners,
        click: this.hideOrShow
      }
    }
  },
  methods: {
    updateValue(event) {
      this.$emit("input", event.target.value);
    },
    hideOrShow() {
      if (this.inputType === "password") {
        this.inputType = "text";
        this.eye_icon = eye_on;
      } else if (this.inputType === "text") {
        this.inputType = "password";
        this.eye_icon = eye_off;
      }
    }
  }
};
</script>

<style scoped>
@import "../css/global.css";
img {
  position: absolute;
  width: 20px;
  height: 20px;
  right: 20px;
  bottom: 10px;
  cursor: pointer;
}
</style>
