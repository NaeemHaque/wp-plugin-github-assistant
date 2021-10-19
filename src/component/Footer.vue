<template>
<div>
  <el-footer>
    &copy; <a href="https://github.com/NaeemHaque" target="_blank"  class="decoration__none">
    <strong>Naeem Haque</strong></a> - {{ new Date().getFullYear() }}
  </el-footer>
</div>
</template>

<script>
export default {
  name: "Footer"
}
</script>

<style scoped>
.decoration__none {
  text-decoration: none;
  color: #fff;
}
.el-footer {
  background-color: #2D333B;
  color: #fff;
  text-align: center;
  line-height: 60px;
  font-size: 20px;
}
</style>