<template>
  <div class="container w-3/5 mx-auto bg-white">
    <h2 class="text-center text-blue py-10">الحاسبة الالكترونية لضريبة الدخل لسنة {{ year }}</h2>

    <form class="pb-10 px-10" method="get">
      <div class="flex flex-row-reverse content-around flex-wrap bg-white h-64">
        <div class="w-1/2 p-2">
          <div class="text-blue text-center font-semibold p-2">
            <label class="flex flex-row-reverse p-1">الاقامة في الاردن</label>
            <div class="flex flex-row-reverse p-1">
              <div class="inline-flex flex-row-reverse w-full">
                <button
                  v-on:click="select"
                  class="border shadow w-full text-blue hover:bg-blue-dark hover:text-white font-bold py-2 px-4 rounded-l"
                >
                  <input class="appearance-none" type="radio" name="resident" value="yes" v-model="dataUser.resident">
                  مقيم
                </button>
                <button
                  v-on:click="select"
                  class="border shadow w-full text-blue hover:bg-blue-dark hover:text-white font-bold py-2 px-4 rounded-r"
                >
                  <input class="appearance-none" type="radio" name="resident" value="no" v-model="dataUser.resident">
                  غير مقيم
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="w-1/2 p-2">
          <div class="text-blue text-center font-semibold p-2">
            <label class="flex flex-row-reverse p-1">الحالة الاجتماعية</label>
            <div class="flex flex-row-reverse p-1">
              <div class="inline-flex flex-row-reverse w-full">
                <button
                  v-on:click="select"
                  class="border shadow w-full text-blue hover:bg-blue-dark hover:text-white font-bold py-2 px-4 rounded-l"
                >
                  <input class="appearance-none" type="radio" value="married" v-model="kilo">
                  متزوج
                </button>
                <button
                  v-on:click="select"
                  class="border shadow w-full text-blue hover:bg-blue-dark hover:text-white font-bold py-2 px-4 rounded-r"
                >
                  <input class="appearance-none" type="radio" value="notMarried" v-model="isMarried">
                  غير متزوج
                </button>
              </div>
            </div>
          </div>
        </div>

        <template v-if="isMarried" class="spouse-info">
          <div class="w-1/2 p-2">
            <div class="text-blue text-center font-semibold p-2">
              <label class="flex flex-row-reverse p-1">مجموع الدخل السنوي للزوجة</label>
              <div class="flex flex-row-reverse p-1">
                <input class="border w-full h-8 rounded" type="text" name="income" v-model="dataUser.spouse_income">
              </div>
            </div>
          </div>

          <div class="w-1/2 p-2">
            <div class="text-blue text-center font-semibold p-2">
              <label class="flex flex-row-reverse p-1">هل الزوجة مقيمة؟</label>
              <div class="flex flex-row-reverse p-1">
                <div class="inline-flex flex-row-reverse shadow w-full">
                  <button
                    v-on:click="select"
                    class="border shadow w-full text-blue hover:bg-blue-dark hover:text-white font-bold py-2 px-4 rounded-l"
                  >
                    <input class="appearance-none" type="radio" name="spouse_resident" value="yes" v-model="dataUser.spouse_resident">
                    نعم
                  </button>
                  <button
                    v-on:click="select"
                    class="border shadow w-full text-blue hover:bg-blue-dark hover:text-white font-bold py-2 px-4 rounded-r"
                  >
                    <input class="appearance-none" type="radio" name="spouse_resident" value="no" v-model="dataUser.spouse_resident">
                    لا
                  </button>
                </div>
              </div>
            </div>
          </div>
        </template>

<input class="" type="radio" name="spouse_resident" value="yes" v-model="dataUser.spouse_resident">
<input class="" type="radio" name="spouse_resident" value="no" v-model="dataUser.spouse_resident">
        <div class="w-1/2 p-2">
          <div class="text-blue text-center font-semibold p-2">
            <label class="flex flex-row-reverse p-1">مجموع الدخل السنوي للزوج</label>
            <div class="flex flex-row-reverse p-1">
              <input class="border w-full h-8 rounded" type="text" name="income" v-model="dataUser.income">
            </div>
          </div>
        </div>
      </div>
      <div class="mt-12">
        <button
          class="w-full bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded"
        >احسب الضريبة</button>
      </div>
    </form>
  </div>
</template>

<script>
module.exports = {
  data: function() {
    return {
      year: new Date().getFullYear(),
      isMarried: true,

      kilo: '',
      
      dataUser: {
        checked: false,
        married: '',
        income: '',
        spouse_income: '',
        spouse_residen: '',
        resident: ''
      }
    };
  },

  methods: {
    select: function(event) {
      if (event) event.preventDefault();

      var clickedBtn = event.target;
      var siblingBtn = clickedBtn.nextElementSibling
        ? clickedBtn.nextElementSibling
        : clickedBtn.previousElementSibling;
      var radioButton = clickedBtn.children[0];

      radioButton.checked = true;

      this.toggleButtonTheme(clickedBtn, siblingBtn);

      console.table("TEST married: ", this.dataUser);
    },

    toggleButtonTheme: function(clickedBtn, siblingBtn) {
      var selectedButtonTheme = ["bg-blue", "text-white"];
      var notSelectedButtonTheme = ["bg-white", "text-blue"];

      clickedBtn.classList.add(...selectedButtonTheme);
      clickedBtn.classList.remove(...notSelectedButtonTheme);
      siblingBtn.classList.remove(...selectedButtonTheme);
      siblingBtn.classList.add(...notSelectedButtonTheme);
    },

    toggleMarried: function(event) {
      if (event) event.preventDefault();

      console.log("toggleMarried worked");
      this.isMarried = !this.isMarried;
    }
  },

  watch: {
    kilo: function (val) {
      this.kilo = val;
      console.log('kilo', this.kilo);
      console.log('val', val);
    }
  }
};
</script>

<style scoped>
</style>
