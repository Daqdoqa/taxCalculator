<template>
  <div class="container w-3/5 mx-auto bg-white">
    <h2 class="text-center text-blue py-10">الحاسبة الالكترونية لضريبة الدخل لسنة {{ year }}</h2>

    <form v-on:submit="checkForm" class="pb-10 p-20" method="get">
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
                  <input
                    class="appearance-none"
                    type="radio"
                    name="resident"
                    value="yes"
                    v-model="userData.resident"
                  >
                  مقيم
                </button>
                <button
                  v-on:click="select"
                  class="border shadow w-full text-blue hover:bg-blue-dark hover:text-white font-bold py-2 px-4 rounded-r"
                >
                  <input
                    class="appearance-none"
                    type="radio"
                    name="resident"
                    value="no"
                    v-model="userData.resident"
                  >
                  غير مقيم
                </button>
              </div>
            </div>
            <div
              v-bind:class="{ invisible: !formValidationErrors.resident }"
              class="bg-red-lightest border border-red-light text-red-dark px-4 py-3 rounded relative"
              role="alert"
            >
              <span class="block sm:inline">{{ formValidationErrors.resident }}</span>
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
                  <input
                    class="appearance-none"
                    type="radio"
                    name="married"
                    value="yes"
                    v-model="userData.married"
                  >
                  متزوج
                </button>
                <button
                  v-on:click="select"
                  class="border shadow w-full text-blue hover:bg-blue-dark hover:text-white font-bold py-2 px-4 rounded-r"
                >
                  <input
                    class="appearance-none"
                    type="radio"
                    name="married"
                    value="no"
                    v-model="userData.married"
                  >
                  غير متزوج
                </button>
              </div>
            </div>
            <div
              v-bind:class="{ invisible: !formValidationErrors.married }"
              class="bg-red-lightest border border-red-light text-red-dark px-4 py-3 rounded relative"
              role="alert"
            >
              <span class="block sm:inline">{{ formValidationErrors.married }}</span>
            </div>
          </div>
        </div>

        <div class="w-1/2 p-2">
          <div class="text-blue text-center font-semibold p-2">
            <label class="flex flex-row-reverse p-1">مجموع الدخل السنوي للزوج</label>
            <div class="flex flex-row-reverse p-1">
              <input
                v-on:input="checkInput"
                v-on:focusout="checkInput"
                v-bind:class="{' border-red-light': formValidationErrors.income }"
                class="border w-full h-8 rounded text-right"
                type="text"
                name="income"
                v-model="userData.income"
              >
            </div>

            <div
              v-bind:class="{ invisible: !formValidationErrors.income }"
              class="bg-red-lightest border border-red-light text-red-dark px-4 py-3 rounded relative"
              role="alert"
            >
              <span class="block sm:inline">{{ formValidationErrors.income }}</span>
            </div>
          </div>
        </div>

        <template class="spouse-info">
          <div class="spouse-info invisible w-1/2 p-2">
            <div class="text-blue text-center font-semibold p-2">
              <label class="flex flex-row-reverse p-1">هل الزوجة مقيمة؟</label>
              <div class="flex flex-row-reverse p-1">
                <div class="inline-flex flex-row-reverse shadow w-full">
                  <button
                    v-on:click="select"
                    class="border shadow w-full text-blue hover:bg-blue-dark hover:text-white font-bold py-2 px-4 rounded-l"
                  >
                    <input
                      class="appearance-none"
                      type="radio"
                      name="spouse_resident"
                      value="yes"
                      v-model="userData.spouse_resident"
                    >
                    نعم
                  </button>
                  <button
                    v-on:click="select"
                    class="border shadow w-full text-blue hover:bg-blue-dark hover:text-white font-bold py-2 px-4 rounded-r"
                  >
                    <input
                      class="appearance-none"
                      type="radio"
                      name="spouse_resident"
                      value="no"
                      v-model="userData.spouse_resident"
                    >
                    لا
                  </button>
                </div>
              </div>
              <div
                v-bind:class="{ invisible: !formValidationErrors.spouse_resident }"
                class="bg-red-lightest border border-red-light text-red-dark px-4 py-3 rounded relative"
                role="alert"
              >
                <span class="block sm:inline">{{ formValidationErrors.spouse_resident }}</span>
              </div>
            </div>
          </div>

          <div class="spouse-info invisible w-1/2 p-2">
            <div class="text-blue text-center font-semibold p-2">
              <label class="flex flex-row-reverse p-1">مجموع الدخل السنوي للزوجة</label>
              <div class="flex flex-row-reverse p-1">
                <input
                  v-on:input="checkInput"
                  v-on:focusout="checkInput"
                  v-bind:class="{' border-red-light': formValidationErrors.spouse_income }"
                  class="border w-full h-8 rounded text-right"
                  type="text"
                  name="spouse_income"
                  v-model="userData.spouse_income"
                >
              </div>
              <div
                id="spouse_income"
                v-bind:class="{ invisible: !formValidationErrors.spouse_income }"
                class="bg-red-lightest border border-red-light text-red-dark px-4 py-3 rounded relative"
                role="alert"
              >
                <span class="block sm:inline">{{ formValidationErrors.spouse_income }}</span>
              </div>
            </div>
          </div>
        </template>
      </div>

      <div class="mt-20">
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
      userData: {
        resident: null,
        married: null,
        income: null,
        spouse_resident: null,
        spouse_income: null
      },
      formValidationErrors: {
        resident: null,
        married: null,
        income: null,
        spouse_resident: null,
        spouse_income: null
      }
    };
  },

  methods: {
    select: function(event) {
      if (event) event.preventDefault();

      const clickedBtn = event.target;
      const siblingBtn = clickedBtn.nextElementSibling
        ? clickedBtn.nextElementSibling
        : clickedBtn.previousElementSibling;
      const radioButton = clickedBtn.children[0];

      this.checkRadioBtn(radioButton);
      this.toggleButtonTheme(clickedBtn, siblingBtn);

      this.toggleSpouseInfo();

      this.checkInput({ target: radioButton });
    },

    toggleButtonTheme: function(clickedBtn, siblingBtn) {
      const selectedButtonTheme = ["bg-blue", "text-white"];
      const notSelectedButtonTheme = ["bg-white", "text-blue"];

      clickedBtn.classList.add(...selectedButtonTheme);
      clickedBtn.classList.remove(...notSelectedButtonTheme);
      siblingBtn.classList.remove(...selectedButtonTheme);
      siblingBtn.classList.add(...notSelectedButtonTheme);
    },

    checkRadioBtn: function(radioButton) {
      radioButton.setAttribute("checked", true);
      this.userData[radioButton.name] = radioButton.value;
    },

    toggleSpouseInfo: function() {
      const spouseInfo = document.getElementsByClassName("spouse-info");
      const isMarried = this.userData.married == "yes" ? true : false;

      if (isMarried) {
        spouseInfo[0].classList.add("visible");
        spouseInfo[1].classList.add("visible");
        spouseInfo[0].classList.remove("invisible");
        spouseInfo[1].classList.remove("invisible");
      } else {
        spouseInfo[0].classList.add("invisible");
        spouseInfo[1].classList.add("invisible");
        spouseInfo[0].classList.remove("visible");
        spouseInfo[1].classList.remove("visible");
      }
    },

    checkForm: function(e) {
      if (e) e.preventDefault();

      for (const key in this.userData) {
        if (this.userData.hasOwnProperty(key)) {
          this.checkError(key, this.userData[key]);
        }
      }

      // TODO: send the userData Object to the API if the form is valid
      if (this.isValid()) {
        console.log("Send the object userData to the API: valid");
        console.log(this.userData);
      } else {
        console.log("Send the object userData to the API: NOT valid");
      }
    },

    checkError: function(key, value) {
      const isNumber = /^\d*\.?\d+$/.test(value);
      const isNotMarried =
        this.userData.married == null || this.userData.married == "no";

      if (!value) {
        this.formValidationErrors[key] = "هذا الحقل مطلوب";
      } else if (key.indexOf("income") != -1 && !isNumber) {
        this.formValidationErrors[key] = "ادخل ارقام فقط";
      } else this.formValidationErrors[key] = null;

      if (isNotMarried) {
        this.formValidationErrors.spouse_resident = null;
        this.formValidationErrors.spouse_income = null;
      }
    },

    checkInput: function(e) {
      const element = e.target;
      this.checkError(element.name, element.value);
    },

    isValid: function() {
      const errors = Object.values(this.formValidationErrors);

      for (let i = 0; i < errors.length; i++) {
        if (errors[i]) return false;
      }

      return true;
    }
  }
};
</script>

<style scoped>
</style>
