<template>
  <div class="container mt-4">
    <div class="new-event mt-5 mb-5">
      <h2>สร้างอีเว้นท์</h2>
    </div>

    <div class="row">
      <div class="col col-lg-6">
        <div class="shadow new-event-img mb-3">
          <input
            type="file"
            name="img1"
            id="img1"
            style="width: 0; height: 0; overflow: hidden; "
            @change="upload($event, 'image1')"
          />

          <label  for="img1">
            <img :src="form.image1" alt="" width="100%" height="100%" />
            <img
              class="img-upload"
              src="https://icons-for-free.com/iconfiles/png/512/plus+icon-1320184416519705957.png"
              width="50"
            />
          </label>
        </div>
        <div class="row">
          <div class="col-4">
            <div class="shadow event-img-other">
              <input
                type="file"
                name="img2"
                id="img2"
                style="width: 0; height: 0; overflow: hidden;"
                @change="upload($event, 'image2')"
              />

              <label for="img2">
                <img :src="form.image2" alt="" width="100%" height="100%" />
                <img
                  class="img-upload"
                  src="https://icons-for-free.com/iconfiles/png/512/plus+icon-1320184416519705957.png"
                  width="50"
                />
              </label>
            </div>
          </div>
          <div class="col-4">
            <div class="shadow event-img-other">
              <div class="shadow event-img-other">
                <input
                  type="file"
                  name="img3"
                  id="img3"
                  style="width: 0; height: 0; overflow: hidden;"
                  @change="upload($event, 'image3')"
                />

                <label for="img3">
                  <img :src="form.image3" alt="" width="100%" height="100%" />
                  <img
                    class="img-upload"
                    src="https://icons-for-free.com/iconfiles/png/512/plus+icon-1320184416519705957.png"
                    width="50"
                  />
                </label>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="shadow event-img-other">
              <input
                type="file"
                name="img4"
                id="img4"
                style="width: 0; height: 0; overflow: hidden;"
                @change="upload($event, 'image4')"
              />

              <label for="img4">
                <img :src="form.image4" alt="" width="100%" height="100%" />
                <img
                  class="img-upload"
                  src="https://icons-for-free.com/iconfiles/png/512/plus+icon-1320184416519705957.png"
                  width="50"
                />
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="col col-lg-6">
        <div class="new-event-detail">
          <div class="new-event-form">
            <input
              type="text"
              class="form-control"
              placeholder="ระบุชื่องาน"
              v-model="form.name"
            />
            <div class="new-event-icon-input float-left mt-4">
              <div class="icon-new float-left">
                <i class="far fa-calendar-alt"></i>
              </div>
              <div class="icon-new-input float-left">
                <input
                  type="date"
                  class="form-control"
                  placeholder="กรุณาระบุวันที่"
                />
              </div>
            </div>
            <div class="clear-fix"></div>

            <div class="new-event-icon-input float-left mt-2">
              <div class="icon-new float-left">
                <i class="fas fa-clock"></i>
              </div>
              <div class="icon-new-input float-left">
                <input
                  type="time"
                  class="form-control"
                  placeholder="กรุณาระบุเวลา"
                />
              </div>
            </div>

            <label class="mt-3">Tags</label>
            <b-form-tags
            input-id="tags-basic"
            tag-variant="primary"
            tag-pills
            separator=" "
            v-model="form.tag"></b-form-tags>

            <div class="e-info mt-3">
              <h5>ข้อมูลอีเว้นท์</h5>
              <textarea
                class="form-control"
                v-model="form.des"
                rows="10"
              ></textarea>
            </div>

            <hr />

            <div class="b-info mt-3">
              <h5 class="title-create">การจองบูธ</h5>
              <div class="form-group">
                <label for=""> เวลาเริ่มต้น </label>
                <b-form-datepicker
                  id="example-datepicker"
                  class="d-fixed mt-2"
                  v-model="form.b_start"
                ></b-form-datepicker>
              </div>
              <div class="form-group">
                <label for=""> เวลาสิ้นสุด </label>
                <b-form-datepicker
                  id="example-datepicker"
                  class="mb-2"
                  v-model="form.b_end"
                ></b-form-datepicker>
              </div>

              ประเภทสินค้า
              <div v-for="(item, index) in type" :key="item.id">
                <input
                  class="input-create"
                  type="text"
                  v-model="form.type[index].name"
                  placeholder="ชื่อ"
                />
                <input
                  class="input-create"
                  type="text"
                  v-model="form.type[index].price"
                  placeholder="ราคา"
                />

                <button @click="aType()" class="button-create">+</button>
              </div>

              ขนาดบูธ
              <div v-for="(item, index) in size" :key="item.id">
                <input
                  class="input-create"
                  type="text"
                  v-model="form.size[index].name"
                  placeholder="ชื่อ"
                />
                <input
                  class="input-create"
                  type="text"
                  v-model="form.size[index].price"
                  placeholder="ราคา"
                />

                <input
                  class="input-create"
                  type="text"
                  v-model="form.size[index].amount"
                  placeholder="จำนวน"
                />

                <button @click="aSize()" class="button-create">+</button>
              </div>

              อุปกรณ์ที่ต้องการเพิ่ม
              <div v-for="(item, index) in extra" :key="item.id">
                <input
                  class="input-create"
                  type="text"
                  v-model="form.extra[index].name"
                  placeholder="ชื่อ"
                />
                <input
                  class="input-create"
                  type="text"
                  v-model="form.extra[index].price"
                  placeholder="ราคา"
                />

                <button @click="aExtra()" class="button-create">+</button>
              </div>
            </div>

            <!-- จองบูธ -->
            <hr>
            <div class="e-event mt-4">
              <h5 class="title-create">รายละเอียดเกี่ยวกับตั๋วเข้างาน</h5>
              <div class="form-group">
                <label for=""> เวลาเริ่มต้น </label>
                <b-form-datepicker
                  id="example-datepicker"
                  class="mb-2"
                  v-model="form.b_start"
                ></b-form-datepicker>
              </div>
              <div class="form-group">
                <label for=""> เวลาสิ้นสุด </label>
                <b-form-datepicker
                  id="example-datepicker"
                  class="mb-2"
                  v-model="form.b_end"
                ></b-form-datepicker>
              </div>

              <div>
                <div class="card p-2" v-for="(p, index) in price" :key="index">
                  <input
                    class="input-create"
                    type="text"
                    placeholder="ราคา"
                    v-model="form.prices[index].price"
                  />

                  <div
                    class="detail"
                    v-for="(time, i) in form.prices[index].times"
                    :key="i"
                  >
                    เวลาเริ่ม
                    <input
                      class="input-create"
                      type="time"
                      placeholder=""
                      v-model="form.prices[index].times[i].start"
                    />
                    เวลาสิ้นสุด
                    <input
                      class="input-create"
                      type="time"
                      placeholder=""
                      v-model="form.prices[index].times[i].end"
                    />
                    <input
                      class="input-create"
                      type="text"
                      placeholder="ราคา"
                      v-model="form.prices[index].times[i].amount"
                    />
                    <button @click="aDetail(index)" class="button-create-text">เพิ่มเวลาอื่นๆ</button>
                  </div>
                </div>
                <button @click="aPrice()" class="button-create-text">เพิ่มราคา</button>
              </div>
            </div>

            <hr>
            <div class="e-event mt-4">
              <h5 class="title-create">แผนที่การเดินทาง</h5>
            <div>
              <input
                class="input-create"
                type="text"
                placeholder="ชื่อสถานที่"
                v-model="form.map_name"
              />
              <input
                class="input-create"
                type="text"
                placeholder="รายละสถานที่"
                v-model="form.map_address"
              />
              <input
                class="input-create"
                type="text"
                placeholder="google_map_url"
                v-model="form.google_map_url"
              />
              <input class="input-create" type="text" placeholder="mrt" v-model="form.mrt" />
              <input class="input-create" type="text" placeholder="bts" v-model="form.bts" />
              <input class="input-create" type="text" placeholder="bus" v-model="form.bus" />
              <input
                class="input-create"
                type="text"
                placeholder="near_location"
                v-model="form.near_location"
              />
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data: () => ({
    form: {
      image1: "",
      image2: "",
      image3: "",
      image4: "",
      type: [{ name: "", price: "" }],
      size: [{ name: "", price: "", amount: "" }],
      extra: [{ name: "", price: "" }],
      prices: [
        { price: "", times: [{ start: "", end: "", amount: "" }], time: 1 },
      ],
    },
    type: 1,
    size: 1,
    extra: 1,
    price: 1,
  }),
  methods: {
    aType() {
      this.type++;
      this.form.type.push({ name: "", price: "" });
    },
    aSize() {
      this.size++;
      this.form.size.push({ name: "", price: "", amount: "" });
    },
    aExtra() {
      this.extra++;
      this.form.extra.push({ name: "", price: "" });
    },
    aPrice() {
      this.price++;
      this.form.prices.push({
        price: "",
        times: [{ start: "", end: "", amount: "" }],
        time: 1,
      });
    },
    aDetail(index) {
      this.form.prices[index].times.push({ start: "", end: "", amount: "" });
    },
    async upload(e, name) {
      let file = e.target.files[0];
      let form = new FormData();
      form.append("uploadFileObj", file);
      const { data } = await axios.post("/api/image/upload", form);
      this.form[name] = data.url;
    },
  },
};
</script>

<style>
img {
  object-fit: cover;
}
</style>
<style scoped>
.d-fixed{
  font-weight: 300 !important;
  font-size: 12px !important;
}
#example-datepicker{
  font-weight: 300 !important;
  font-size: 12px !important;
}
.new-event-img {
  width: 100%;
  height: 600px;
}
.event-img-other {
  width: 100%;
  height: 100px;
}
.icon-new {
  width: 40px;
  height: 40px;
}
.new-event-detail {
  width: 100%;
}
.icon-new i {
  width: 40px;
  height: 40px;
  text-align: center;
  font-size: 20px;
  margin-top: 10px;
}
/* .new-event-form input {
  width: 100%;
  border: none;
  border-radius: 0px;
  outline: none !important;
  border-bottom: 1px solid #fd4e52;
} */
.new-event-icon-input {
  width: 100%;
  margin-top: 10px;
  margin-bottom: 10px;
}
.dropdown-menu{
  font-size: 14px;
}
.input-create{
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  margin-top: 5px;
  margin-bottom: 5px;
}
.button-create{
  width: 35px;
  height: 35px;
  border-radius: 5px;
  border: 1px solid rgb(233, 110, 110);
  margin-top: 5px;
  margin-bottom: 5px;
  background-color: rgb(233, 110, 110);
  color: #fff;
  font-size: 20px;
}
.button-create-text{
  padding: 5px;
  border-radius: 5px;
  border: 1px solid rgb(233, 110, 110);
  margin-top: 5px;
  margin-bottom: 5px;
  background-color: rgb(233, 110, 110);
  color: #fff;
}
.title-create{
  margin-bottom: 20px;
}
.badge{
  margin-right: 10px !important;
}
.img-upload{
  position: absolute;
  margin: -30px -50px;

  }
</style>
