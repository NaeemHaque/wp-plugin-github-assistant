<template>
  <div class="__wrapper">
    <el-aside width="30%">
      <el-row>
        <div class=" __image">
          <img :src="user.avatar_url" alt="Avatar" class="center">
        </div>
      </el-row>
      <el-row>
        <div class="information">
          <h1 class="title">
            {{  user.name }}
          </h1>

          <div class="user">
            {{ user.login }}
          </div>
          <div class="bio">
            {{ user.bio }}
          </div>
          <div class="with_icon"  v-if="user.company">
            {{ user.company }}
          </div>

          <div class="with_icon"  v-if="user.location">
            {{ user.location }}
          </div>

          <div class="with_icon" v-if="user.twitter_username">
            {{ user.twitter_username }}
          </div>
        </div>
      </el-row>
    </el-aside>
    <el-main>
      <div class="search_result_wrapper">
        <h1 class="result_title">{{ user.public_repos }} Repositories</h1>

        <el-row :gutter="24" class="card_row">
          <el-col :span="11" class="card_column"  v-for="(item, i) in data" :key="i">
              <el-card shadow="always" class="search--item">
                <el-row class="search__results">
                  <a :href="item.html_url" target="_blank" class="repo_name">{{item.name}}</a>
                </el-row>
                 <el-row :gutter="24" class="repo__col">
                   <el-col  :span="8" v-if="item.language">
                     <el-tooltip class="item" effect="dark" content="Language" placement="bottom">
                     <div>
                       {{ item.language }}
                     </div>
                     </el-tooltip>
                   </el-col>
                   <el-col  :span="8">
                     <el-tooltip class="item" effect="dark" content="Forks" placement="bottom">
                       <div>
                         {{ item.forks }}
                       </div>
                     </el-tooltip>
                   </el-col>
                   <el-col  :span="8">
                     <el-tooltip class="item" effect="dark" content="Watchers" placement="bottom">
                       <div>
                         {{ item.watchers_count }}
                       </div>
                     </el-tooltip>
                   </el-col>
                 </el-row>
                <el-row>
                  <div class="description">
                    {{ item.description }}
                  </div>
                </el-row>
              </el-card>
          </el-col>

        </el-row>

      </div>
    </el-main>
  </div>
</template>

<script>
import moment from 'moment'

export default {
  props: ['login'],

  data: () => ({
    username: '',
    data: [],
    user: [],
    date: []
  }),

  created () {
    const name = this.login

    jQuery.ajax({
      type: "post",
      dataType: "json",
      url: ajaxurl,
      data: {
        action:'user_repos',
        user: name,
        nonce: githubasistant.g_nonce
      }
    })
     .then((res) => {
        this.data = res.data
        // formate date
        for (var i in res.data) {
         this.date.push(moment(String(res.data[i].updated_at)).format('MM/DD/YYYY'))
        }
     })
     .catch((error) => {
         console.log(error)
      });


    //user data
    jQuery.ajax({
      type: "post",
      dataType: "json",
      url: ajaxurl,
      data: {
        action:'user_information',
        user: name,
        nonce: githubasistant.g_nonce
      }
    })
    .then(res => {
       this.user = res.data
    })
    .catch((error) => {
       console.log(error)
    });
  }
}
</script>


<style scoped>
.__wrapper {
  display: flex;
}
.el-aside {
  background: none;
  color:  #5F7C8A;
  padding: 20px;
  border-right: 1px solid #2D333B;
  margin: 20px 0;
}

.el-main {
  background: none;
  color: aliceblue;
  text-align: center;
}


img {
  border-radius: 50%;
  max-width: 200px;
  max-height: 200px;
}
.center {
  display: block !important;
  margin-left:23% !important;
  padding: 10px;

}
.information {
  margin-bottom: 15px;
}
.title {
  color: aliceblue;
  font-size: 30px;
  text-align: center;
}
.user {
  color:  #5F7C8A;
  font-size: 13px;
  text-align: center !important;
}
.bio {
  color:  #5F7C8A;
  font-size: 17px;
  text-align: center !important;
  padding: 5px;
}
.with_icon{
  color:  #5F7C8A;
  font-size: 18px;
  text-align: center !important;
  padding: 5px;
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
.repo_name{
  text-decoration: none;
  font-size: 18px;
  /*margin-left: 10px;*/
  color: #2196F3;
}
.card_row {
  margin-left: 20px !important;
}
.card_column {
  margin: 10px 0 !important;
}
.search--item {
  background: #262d38 !important;
}
.el-card__body {
  padding: 10px !important;
}
.search--item:hover {
  background: #2e3844de !important;

}

.repo__col {
  color: #5F7C8A;
  text-align: start;
}
.item {
  margin: 4px;
}
.description {
  color: #5F7C8A;
  text-align: start;
}

.decoration__none {
  text-decoration: none !important;
}

</style>