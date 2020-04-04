<template>
  <div class="field">
    <label v-if="label" for="username">{{ label }}</label>
    <input
      type="text"
      id="username"
      :value="value"
      v-bind="$attrs"
      @input="input($event)"
    />
  </div>
</template>

<script>
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
  methods: {
    input(event) {
      this.$emit("input", event.target.value);
    }
  }
};
</script>

<style scoped>
@import "../css/global.css";
</style>
