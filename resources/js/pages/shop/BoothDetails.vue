<template>
  <div class="container">
    <form-wizard
      nextButtonText="ถัดไป"
      backButtonText="ย้อนกลับ"
      finishButtonText="กลับสู่หน้าหลัก"
      title=""
      subtitle=""
      stepSize="xs"
      @on-change="onComplete"
    >
      <tab-content title="ข้อมูลทั่วไป">
        <div class="row">
          <div class="col-lg-8">
            <div class="card p-3">
              <div class="row">
                <div class="col-lg-6">
                  <img :src="tmp_booth.image1" class="custom-img" />
                </div>
                <div class="col-lg-6 my-2">
                  <h2 class="text-main">
                    <strong>{{ tmp_booth.title }}</strong>
                  </h2>
                  <small class="text-muted my-3"
                    >{{ "owner by " }} {{ tmp_booth.user.name }}</small
                  >
                  <div class="d-flex align-items-center my-2">
                    <div class="iconBtn">
                      <img src="/assets/icon/calendar.png" class="img-fluid" />
                    </div>
                    <div class="ml-2">
                      <p class="mb-0">{{ tmp_booth.date }}</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center my-2">
                    <div class="iconBtn">
                      <img src="/assets/icon/time.png" class="img-fluid" />
                    </div>
                    <div class="ml-2">
                      <p class="mb-0">{{ tmp_booth.time }}</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center my-2">
                    <div class="iconBtn">
                      <img src="/assets/icon/pin.png" class="img-fluid" />
                    </div>
                    <div class="ml-2">
                      <p class="mb-0">{{ tmp_booth.map_name }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card p-3 my-4">
              <div class="row my-4">
                <div class="col-6">
                  <h2>{{ "ข้อมูลส่วนตัว" }}</h2>
                </div>
                <div class="col-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" />
                    <label class="form-check-label">
                      ข้อมูลเดิมกับโปร์ไฟล์
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-6">
                  <label>ชื่อ</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="กรอกชื่อจริง"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label>นามสกุล</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="กรอกนามสกุล"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-6">
                  <label>อีเมล์</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="กรอกอีเมล์"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label>โทรศัพท์</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="กรอกเบอร์โทรศัพท์"
                  />
                </div>
              </div>
              <div class="row my-4">
                <div class="col-6">
                  <h2>{{ "ช่องทางการขาย" }}</h2>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-6">
                  <label>FACEBOOK PAGE</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="eventyseller"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label>TWITTER</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="eventyseller"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-6">
                  <label> INSTAGRAM</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="eventyseller"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label>YOUTUBE</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="eventyseller"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-6">
                  <label>LINE</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="@eventyseller"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label>WEBSITE</label>
                  <input type="text" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-12">
                  <label>ชื่อร้านค้า</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="eventyseller"
                  />
                </div>
              </div>
              <div class="row my-4">
                <div class="col-6">
                  <h2>{{ "ตัวอย่างภาพหรือผลงาน" }}</h2>
                </div>
              </div>
              <div class="row">
                <div
                  class="col-lg-4 imgUp"
                  v-for="(image, k_img) in images"
                  :key="k_img"
                >
                  <div class="imagePreview" v-if="!image.url"></div>
                  <img v-else :src="image.url" class="imagePreview" />
                  <label class="btn btn-primary"
                    >Upload
                    <input
                      type="file"
                      class="custom-btn-img"
                      @input="onFileChange($event, k_img)"
                    />
                  </label>
                  <i
                    v-if="images.length > 1"
                    class="fa fa-times del"
                    @click.prevent="delImage(k_img)"
                  ></i>
                  <i class="fa fa-plus imgAdd" @click.prevent="addImage"></i>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-12">
                  <label>เว็บไซต์ / ลิ้งค์ เพิ่มเติม</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="https://www.google.com/intl/en_in/drive/"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-12">
                  <label>ฝากข้อความถึงผู้จัด</label>
                  <textarea class="form-control" rows="5"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </tab-content>
      <tab-content title="รายละเอียดบูธ">
        <div class="row">
          <div class="col-lg-8">
            <div class="card p-3">
              <div class="row">
                <div class="col-lg-6">
                  <img :src="tmp_booth.image1" class="custom-img" />
                </div>
                <div class="col-lg-6 my-2">
                  <h2 class="text-main">
                    <strong>{{ tmp_booth.title }}</strong>
                  </h2>
                  <small class="text-muted my-3"
                    >{{ "owner by " }} {{ tmp_booth.user.name }}</small
                  >
                  <div class="d-flex align-items-center my-2">
                    <div class="iconBtn">
                      <img src="/assets/icon/calendar.png" class="img-fluid" />
                    </div>
                    <div class="ml-2">
                      <p class="mb-0">{{ tmp_booth.date_text }}</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center my-2">
                    <div class="iconBtn">
                      <img src="/assets/icon/time.png" class="img-fluid" />
                    </div>
                    <div class="ml-2">
                      <p class="mb-0">{{ tmp_booth.time_text }}</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center my-2">
                    <div class="iconBtn">
                      <img src="/assets/icon/pin.png" class="img-fluid" />
                    </div>
                    <div class="ml-2">
                      <p class="mb-0">{{ tmp_booth.map_name }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card p-3 my-3">
              <div class="row my-4">
                <div class="col-lg-12">
                  <h2>{{ "ประเภทสินค้า" }}</h2>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-9">
                  <select
                    class="form-control form-control-sm"
                    v-model="selectedItem"
                  >
                    <option :value="null">กรุณาเลือก 1 รายการ</option>
                    <option
                      v-for="(item, k_i) in tmp_booth.types"
                      :key="k_i"
                      :value="k_i"
                    >
                      {{ item.name }}
                    </option>
                  </select>
                </div>
                <div class="col-3 d-flex align-items-center">
                  <!-- <label class="m-0">{{
                    selectedItem.price ? selectedItem.price + ".-" : ""
                  }}</label> -->
                </div>
              </div>
              <div class="row my-4">
                <div class="col-lg-12">
                  <h2>{{ "ขนาดบูธ / ราคา" }}</h2>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-9">
                  <select
                    class="form-control form-control-sm"
                    v-model="selectedBooth"
                  >
                    <option :value="null">กรุณาเลือก 1 รายการ</option>

                    <option
                      v-for="(booth, k_b) in tmp_booth.sizes"
                      :key="k_b"
                      :value="k_b"
                    >
                      {{ booth.name }}
                    </option>
                  </select>
                </div>
                <div class="col-3 d-flex align-items-center">
                  <!-- <label class="m-0">{{
                    selectedBooth.price ? selectedBooth.price + ".-" : ""
                  }}</label> -->
                </div>
              </div>
              <div class="row my-4">
                <div class="col-12">
                  <h2>{{ "อุปกรณ์ที่ต้องการเพิ่ม" }}</h2>
                </div>
              </div>
              <div
                class="row"
                v-for="(acces, k_access) in tmp_booth.extras"
                :key="k_access"
              >
                <div class="col-lg-12">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      v-model="extras"
                      :value="acces"
                    />
                    <label class="form-check-label">
                      {{ acces.name }}
                    </label>
                  </div>
                </div>
                <hr class="w-100 mx-4" />
              </div>
              <div class="row">
                <div class="form-group col-lg-12">
                  <label>ข้อแนะนำเพิ่มเติม</label>
                  <textarea class="form-control" rows="5"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card p-3">
              <h2 class="text-main">
                <strong>{{ "ค่าใช้จ่าย" }}</strong>
              </h2>
              <hr class="w-100" />
              <div class="row d-flex justify-content-between">
                <div class="col-8" v-if="selectedItem != null">
                  <p>{{ tmp_booth.types[selectedItem].name }}</p>
                </div>
                <div class="col-4" v-if="selectedItem != null">
                  <p class="text-right">
                    {{ tmp_booth.types[selectedItem].price + " .-" }}
                  </p>
                </div>

                <div class="col-8" v-if="selectedBooth != null">
                  <p>{{ tmp_booth.sizes[selectedBooth].name }}</p>
                </div>
                <div class="col-4" v-if="selectedBooth != null">
                  <p class="text-right">
                    {{ tmp_booth.sizes[selectedBooth].price + " .-" }}
                  </p>
                </div>
              </div>
              <div class="row" v-for="extra in extras" :key="extra">
                <div class="col-8">{{ extra.name }}</div>
                <div class="col-4">
                  <p class="text-right">{{ extra.price + " .-" }}</p>
                </div>
              </div>
              <hr class="w-100" />
              <div class="row d-flex justify-content-between">
                <div class="col-8">
                  <p>{{ "ราคาไม่รวมภาษีมูลค่าเพิ่ม" }}</p>
                </div>
                <div class="col-4">
                  <p class="text-right">{{ "100" + " .-" }}</p>
                </div>
                <div class="col-8">
                  <p>{{ "ภาษีมูลค่าเพิ่ม" }}</p>
                </div>
                <div class="col-4">
                  <p class="text-right">{{ "0" + " .-" }}</p>
                </div>

                <hr class="w-100" />
                <div class="col-8">
                  <h4>{{ "รวมทั้งสิ้น" }}</h4>
                </div>
                <div class="col-4">
                  <p class="text-right text-main">{{ summ + " .-" }}</p>
                </div>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label">
                  ยินยอมเงื่อนไข-ข้อตกลง และเกณฑ์การคัดเลือกของ "{{
                    tmp_booth.title
                  }}" ทุกประการ
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="card p-3 my-4">
          <h2>{{ "ช่องทางการชำระเงิน" }}</h2>
          <div class="row my-2">
            <div class="col-lg-4 my-1">
              <button type="button" class="btn btn-outline-primary btn-block">
                <div class="form-group">
                  <div>
                    <img
                      src="https://www.visa.com/images/merchantoffers/2020-04/1588059393757.visa_logo_400x150.jpg"
                      class="custom-btn-img"
                    />
                  </div>
                  <label>บัตรเครคิด / เดบิต</label>
                </div>
              </button>
            </div>
            <div class="col-lg-4 my-1">
              <button type="button" class="btn btn-outline-primary btn-block">
                <div class="form-group">
                  <div>
                    <img
                      src="https://blog.loga.app/wp-content/uploads/2019/07/payment.png"
                      class="custom-btn-img"
                    />
                  </div>
                  <label>ชำระเงินผ่าน QR CODE</label>
                </div>
              </button>
            </div>
            <div class="col-lg-4 my-1">
              <button type="button" class="btn btn-outline-primary btn-block">
                <div class="form-group">
                  <div>
                    <img
                      src="https://technointrend.com/wp-content/uploads/2017/12/paypal_logo.jpg"
                      class="custom-btn-img"
                    />
                  </div>
                  <label>ชำระเงินผ่าน PayPal</label>
                </div>
              </button>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-lg-12">
              <label>ชื่อที่ปรากฎบนบัตร</label>
              <input
                type="text"
                class="form-control"
                placeholder="กรอกชื่อที่ปรากฎบนบัตร"
              />
            </div>
          </div>
          <div class="row">
            <div class="form-group col-lg-6">
              <label>หมายเบขบัตรเครดิต/เดบิต</label>
              <input
                type="text"
                class="form-control"
                placeholder="e.g 11112222333444"
              />
            </div>
            <div class="form-group col-lg-3">
              <label>วันหมดอายุ</label>
              <input type="text" class="form-control" placeholder="MM/YY" />
            </div>
            <div class="form-group col-lg-3">
              <label>CVV</label>
              <input type="text" class="form-control" placeholder="000" />
            </div>
          </div>
        </div>
      </tab-content>
      <tab-content title="สำเร็จ ทำการจองสำเร็จ"> </tab-content>
    </form-wizard>
  </div>
</template>
<script>
import axios from "axios";
import { mapGetters, mapActions } from "vuex";
import { sumBy } from "lodash";
export default {
  name: "OrderDetails",
  computed: {
    ...mapGetters({
      tmp_booth: "event/event",
    }),
    summ() {
      let s = sumBy(this.extras, "price");
      if (this.selectedBooth != null) {
        s += this.tmp_booth.types[this.selectedItem].price;
      }
      if (this.selectedBooth != null) {
        s += this.tmp_booth.sizes[this.selectedBooth].price;
      }

      return s;
    },
  },
  data() {
    return {
      tmp_boothx: {
        id: 1,
        price: 12000,
        image:
          "https://i2.wp.com/www.whatphone.net/wp-content/uploads/2014/11/back-to-school.jpg?fit=600%2C360&ssl=1",
        title: "NCT Back to school",
        type: "บูธใหญ่",
        date: "15 กันยายน 2563",
        time: "08.00 - 15.00น.",
        place: "Impact Exhibition Hall 5",
      },
      images: [{ url: "" }],
      items: [
        { name: "สินค้าประเภท - แฟนอาร์ต", price: 1200 },
        { name: "สินค้าประเภท - แฟนอาร์ต 2", price: 1500 },
        { name: "สินค้าประเภท - แฟนอาร์ต 3", price: 1230 },
      ],
      boothList: [
        { name: "ขนาด - เล็ก", price: 1200 },
        { name: "ขนาด - ปานกลาง", price: 1500 },
        { name: "ขนาด - ใหญ่", price: 1230 },
      ],
      access: [
        { id: 0, name: "เก้าอี้นั้ง" },
        { id: 1, name: "ปลั๊กไฟ (ยาว 1 เมตร)" },
        { id: 2, name: "ป้ายเข้างาน" },
      ],
      selectedItem: null,
      selectedBooth: null,
      extras: [],
    };
  },
  created() {
    this.id = this.$route.params.id;
    this.show(this.id);
  },
  methods: {
    async onComplete(prevIndex, nextIndex) {
      console.log(prevIndex, nextIndex);

      if (nextIndex <= 1) {
        return 0;
      }
      const { data } = await axios.post("/api/booth_purchases", {
        type: this.tmp_booth.types[this.selectedItem],
        size: this.tmp_booth.sizes[this.selectedBooth],
        extras: this.extras,
        event_id: this.id,
        sum: this.summ,
      });

      this.$router.push("/event/" + this.id);
      this.$bvToast.toast("จองบูธสำเร็จ", {
        title: "จองบูธสำเร็จ",
        variant: "success",
        solid: true,
      });
      console.log(data);
    },
    ...mapActions({ show: "event/show" }),

    onFileChange(e, i) {
      const file = e.target.files[0];
      this.images[i].url = URL.createObjectURL(file);
    },
    addImage() {
      this.images.push({ url: "" });
    },
    delImage(i) {
      this.images.splice(i, 1);
    },
    selectItem(e) {
      console.log(e);
    },
  },
};
</script>
<style scoped>
.custom-img {
  width: 100%;
  min-height: 300px;
  max-height: auto;
  float: left;
  margin: 3px;
  padding: 3px;
}
.custom-success-img {
  width: 250px;
  min-height: 200px;
  max-height: auto;
  float: right;
  margin: 3px;
  padding: 3px;
}
.custom-btn-img {
  width: 130px;
  height: 60px;
  float: center;
  margin: 3px;
  padding: 3px;
}
input {
  background-color: transparent;
  border: unset;
  border-bottom: 1px solid #d4d4d4;
  border-radius: unset;
}
.btn-outline-primary {
  color: #000;
}
.btn-outline-primary:hover {
  color: #000;
  background-color: #ffffff00;
}
.btn-outline-primary:not(:disabled):not(.disabled):active,
.btn-outline-primary:not(:disabled):not(.disabled).active,
.show > .btn-outline-primary.dropdown-toggle {
  color: #000;
  background-color: #a3222200;
}
.form-control:focus,
.btn:focus,
.btn.focus {
  border-color: #e75e38;
  box-shadow: unset;
}
.famix {
  color: #50da50;
  font-size: 150px;
  margin: 30px;
}
/* image upload */
.imagePreview {
  width: 100%;
  height: 180px;
  background-position: center center;
  background: url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
  background-color: #fff;
  background-size: cover;
  background-repeat: no-repeat;
  display: inline-block;
  box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
}
.btn-primary {
  display: block;
  border-radius: 0px;
  box-shadow: 0px 4px 6px 2px rgba(0, 0, 0, 0.2);
  margin-top: -5px;
}
.imgUp {
  margin-bottom: 15px;
}
.del {
  position: absolute;
  top: 0px;
  right: 40px;
  width: 30px;
  height: 30px;
  text-align: center;
  line-height: 30px;
  background-color: rgb(255 255 255);
  cursor: pointer;
}
.imgAdd {
  position: absolute;
  top: 0px;
  right: 15px;
  width: 30px;
  height: 30px;
  text-align: center;
  line-height: 30px;
  background-color: rgb(255 255 255);
  cursor: pointer;
}
.custom-btn-img {
  width: 0px;
  height: 0px;
  display: none;
  overflow: hidden;
}
</style>
