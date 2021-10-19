<template>
  <div class="__wrapper">

    <el-row>
      <div class=" __image">
        <img src="http://localhost/ninja-academy/wp-content/plugins/github-assistant/images/github-logo-white.png" alt="Avatar"
             class="center">
      </div>
    </el-row>
    <el-row>
      <div class="">
        <h1 class="title">Welcome To Github Assistant</h1>
      </div>
    </el-row>

    <el-row>
      <form v-on:submit.prevent="submitForm" class="demo-ruleForm">

        <div class="__input">
          <el-input
              placeholder="Search Username"
              v-model="username"
              class="search_box"
              plain
          >
          </el-input>
        </div>
        <div class="__input">
          <el-button plain @click="submitForm">Submit</el-button>
        </div>

      </form>
    </el-row>


    <div class="search_result_wrapper" v-if="clicksubmit">
      <h1 class="result_title">Search Result</h1>

      <el-row :gutter="24" class="card_row">
        <el-col :span="11" class="card_column" v-for="(item, i) in dataItems" :key="i">
          <router-link :to="'/profile/' + item.login" class="decoration__none">
            <el-card shadow="always" class="search--item">
              <div class="search__results">
                <div class="block">
                  <el-avatar :size="50" :src="item.avatar_url"></el-avatar>
                </div>
                <h1 class="username">{{item.login}}</h1>
              </div>
            </el-card>
          </router-link>
        </el-col>
      </el-row>

    </div>


  </div>
</template>


<script>

export default {

  data() {
    return {
      username: '',
      clicksubmit: '',
      dataItems: []
    }
  },

  methods: {
    submitForm() {
      let name = this.username
      this.clicksubmit = this.username
      name = name.split(' ').join('')

      jQuery.ajax({
        type: "post",
        dataType: "json",
        url: ajaxurl,
        data: {
          action:'fetch_users',
          user: this.username,
          nonce: githubasistant.g_nonce
        },
      })
      .then(res => {
        this.dataItems = res.data.items
      })
      .catch((error) => {
         console.log(error)
       })
    }

  }

}
</script>


<style scoped>

.__wrapper {
  min-height: 500px !important;
  padding: 5% 0;
}


img {
  border-radius: 50%;
  max-height: 270px;
  max-width: 270px;
}

.center {
  display: block !important;
  margin-left: 40% !important;
  padding: 10px;

}

.title {
  color: #fff;
  font-size: 40px;
  text-align: center;
}

.__input.__input {
  text-align: center !important;
  padding: 10px;
}

.search_box {
  width: 400px;
  margin: 0 auto !important;
  background: none !important;
  color: #1C2128 !important;
}

.search_result_wrapper {
  max-width: 900px;
  border: 2px solid slategrey;
  text-align: center;
  margin: 0 auto;
  padding: 20px 0;
}

.search__results {
  display: flex;
  align-items: center;
}

.result_title {
  color: aliceblue;
  font-weight: bold;
  font-size: 25px;
}

.username {
  margin-left: 10px;
  color: aliceblue;
}

.card_row {
  margin-left: 20px !important;
}

.card_column {
  margin: 10px !important;
}

.search--item {
  background: #262d38 !important;
}

.search--item:hover {
  cursor: pointer;
  background: #2e3844de !important;
}

.decoration__none {
  text-decoration: none !important;
}
</style>
