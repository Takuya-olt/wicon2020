<template>
<section>
  <FormHeader />
  <BackgroundHolder :title="title" />
  <v-main>
    <v-container>
      <v-row class="flex-column">
        <v-col>
          <v-card outlined class="pa-4">
            <div style="text-align:center">
              <v-btn depressed color="primary" @click="startNotify(),onRead()">scan</v-btn>
              <v-btn depressed color="secondary" @click="stopNotify()">stop</v-btn>
              <br>
              <!-- <v-text-field v-model="weight" label="重さ" placeholder="weight" class="gram" /> -->
              <div class="display-1">
                {{weight}}g
              </div>
              <v-text-field v-model="name" label="ニックネーム(任意)" placeholder="name" class="ma-4"/>
            </div>
            <v-alert class="alert" text>
              ※ホームページ上でニックネームは公開されます。入力する場合は個人情報などを入力しないでください。
            </v-alert>
            <v-alert class="chips" text>
              過去のつり上げ量をご確認いただく際にこのニックネームを使用します。ご入力いただいたニックネームは覚えておいてください。
            </v-alert>
            <v-btn text depressed color="primary" @click="submit(),sendData(),end()">送信</v-btn>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</section>
</template>

<script>
import { ble } from '../../static/web_ble'
import FormHeader from '../../components/modules/FormHeader'


export default {
  components:{
    FormHeader
  },
  data(){
    return{
      title: '堂の川右岸',
      weight: 50,
      name: '',
      success: false,
      FormHeader
    }
  },
  methods: {
    // データ入力
    async sendData () {
      if(this.success){
        const url = '/api/pdo_insert.php'
        await this.$axios.$post(url, {
          box_num: 1,
          weight: this.weight,
          name: this.name
        })
          .then(function (response){
            console.log(response)
          })
          .catch(function(error){
            console.log(error)
          })
      }
    },
    submit () {
      if(this.weight==''){
        alert('重さを取得してください')
      }else{
        this.success = true
      }
    },
        end () {
      if(this.success){
        this.$router.push('/end')
      }
    },
    //-------------------------------------------------
    //Web bluetooth
    //-------------------------------------------------
    startNotify:function(){
      ble.startNotify('UUID1');
    },
    stopNotify:function(){
      ble.stopNotify('UUID1');
    },
    //--------------------------------------------------
    //Scan後の処理
    //--------------------------------------------------
    onScan:function(){
      ble.onScan = function (deviceName) {
        document.getElementById('device_name').innerHTML = deviceName
        document.getElementById('status').innerHTML = 'found device!'
      }
    },
    //--------------------------------------------------
    //ConnectGATT後の処理
    //--------------------------------------------------
    onConnectGATT:function (uuid){
      ble.onConnectGATT = function (uuid) {
        console.log('> connected GATT!');

        document.getElementById('uuid_name').innerHTML = uuid;
        document.getElementById('status').innerHTML = "connected GATT!";
      }
    },
    //--------------------------------------------------
    //Read後の処理：得られたデータの表示など行う
    //--------------------------------------------------
    onRead:function (data, uuid){
      var that = this
      ble.onRead = function(data, uuid){
        //フォーマットに従って値を取得
        this.value = data.getInt16(0);//16bitの場合のフォーマット
        this.value = this.value >>> 0;//unsignedに変更
        that.weight = this.value
        //コンソールに値を表示
        console.log(this.value);

        // value = 4294967296;

        //HTMLにデータを表示
        document.getElementById('data_text').innerHTML = this.value;
        document.getElementById('uuid_name').innerHTML = uuid;
        document.getElementById('status').innerHTML = "read data"
      }
    },
    //--------------------------------------------------
    //Start Notify後の処理
    //--------------------------------------------------
    onStartNotify:function (uuid){
      ble.onStartNotify = function(uuid){
        console.log('> Start Notify!');

        document.getElementById('uuid_name').innerHTML = uuid;
        document.getElementById('status').innerHTML = "started Notify";
      }
    },
    //--------------------------------------------------
    //Stop Notify後の処理
    //--------------------------------------------------
    onStopNotify:function (uuid){
      ble.onStopNotify = function(uuid){
        console.log('> Stop Notify!');

        document.getElementById('uuid_name').innerHTML = uuid;
        document.getElementById('status').innerHTML = "stopped Notify";
      }
    }
  },
  mounted: function(){
    window.addEventListener('load', ble.setUUID("UUID1", "4fafc201-1fb5-459e-8fcc-c5c9c331914b", "beb5483e-36e1-4688-b7f5-ea07361b26a8"), false)
  },
  destroy: function(){
    window.removeEventListener('load', ble.setUUID("UUID1", "4fafc201-1fb5-459e-8fcc-c5c9c331914b", "beb5483e-36e1-4688-b7f5-ea07361b26a8"),false)
  }
}
</script>

<style scoped>
/* .gram::after{
  content: "g";
} */
.alert {
  font-size: 12px;
  color: red;
}
.chips {
  font-size: 12px;
  color: mediumaquamarine;
}
</style>
