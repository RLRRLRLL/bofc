<template>
  <form class="form form-create" @submit.prevent="createPom">
    <input type="hidden" name="_token" :value="csrf" />

    <!-- Base Info fill-up -->
    <div class="form-section">
      <!-- name -->
      <div class="form-group">
        <label>
          <span> Name: </span>
          <span class="input-value"> {{ formData.name }} </span>
        </label>

        <input v-model.lazy="formData.name" type="text" />
      </div>

      <!-- color -->
      <div class="form-group">
        <label>
          <span> Color: </span>
          <span class="input-value"> {{ formData.color }} </span>
        </label>

        <input v-model.lazy="formData.color" type="text" />
      </div>

      <!-- height -->
      <div class="form-group">
        <label>
          <span> Height: </span>
          <span class="input-value"> {{ formData.height }} </span>
        </label>

        <input v-model.lazy="formData.height" type="text" />
      </div>

      <!-- teeth -->
      <div class="form-group">
        <label>
          <span> Teeth: </span>
          <span class="input-value"> {{ formData.teeth }} </span>
        </label>

        <input v-model.lazy="formData.teeth" type="number" />
      </div>

      <!-- birthday -->
      <div class="form-group">
        <label>
          <span> Birthday: </span>
          <span class="input-value"> {{ formData.birthday }} </span>
        </label>

        <input v-model.lazy="formData.birthday" type="date" />
      </div>

      <!-- titles -->
      <div class="form-group">
        <label>
          <span> Titles: </span>
          <span class="input-value">{{ formData.titles }}</span>
        </label>

        <textarea v-model="formData.titles"></textarea>
      </div>

      <!-- father -->
      <div class="form-group">
        <label>
          <span> Father: </span>
          <span class="input-value"> {{ formData.father }} </span>
        </label>

        <input v-model.lazy="formData.father" type="text" />
      </div>

      <!-- mother -->
      <div class="form-group">
        <label>
          <span> Mother: </span>
          <span class="input-value"> {{ formData.mother }} </span>
        </label>

        <input v-model.lazy="formData.mother" type="text" />
      </div>

      <!-- owner -->
      <div class="form-group">
        <label>
          <span> Owner: </span>
          <span class="input-value"> {{ formData.owner }} </span>
        </label>

        <input v-model.lazy="formData.owner" type="text" />
      </div>

      <!-- breeder -->
      <div class="form-group">
        <label>
          <span> Breeder: </span>
          <span class="input-value"> {{ formData.breeder }} </span>
        </label>

        <input v-model.lazy="formData.breeder" type="text" />
      </div>
    </div>

    <!-- Radio INputs -->
    <div class="form-section">
      <!-- radio item -->
      <div class="car-wrapper">
        <label> Age: </label>

        <div class="form-group">
          <input
            id="puppy"
            v-model="formData.age"
            value="puppy"
            type="radio"
            class="mb-px focus:ring-0 focus:outline-none"
          />

          <label for="puppy" class="text-gray-100"> Puppy </label>
        </div>

        <div class="form-group">
          <input
            id="adult"
            v-model="formData.age"
            value="adult"
            type="radio"
            class="mb-px focus:ring-0 focus:outline-none"
          />

          <label for="adult" class="text-gray-100"> Adult </label>
        </div>

        <div class="form-group">
          <input
            id="senior"
            v-model="formData.age"
            value="senior"
            type="radio"
            class="mb-px focus:ring-0 focus:outline-none"
          />

          <label for="senior" class="text-gray-100"> Senior </label>
        </div>
      </div>

      <!-- radio item -->
      <div class="car-wrapper">
        <label> Gender: </label>

        <div class="form-group">
          <input
            id="male"
            v-model="formData.is_male"
            class="mb-px focus:ring-0 focus:outline-none"
            type="radio"
            value="true"
          />
          <label class="text-gray-100" for="male"> Male </label>
        </div>

        <div class="form-group">
          <input
            id="female"
            v-model="formData.is_male"
            class="mb-px focus:ring-0 focus:outline-none"
            type="radio"
            value="false"
          />
          <label class="text-gray-100" for="female"> Female </label>
        </div>
      </div>

      <!-- checkboxes -->
      <div class="car-wrapper">
        <label> Other: </label>

        <ul>
          <li>
            <div class="form-group">
              <input
                id="is_for_sale"
                v-model="formData.is_for_sale"
                name="is_for_sale"
                class="mb-px focus:ring-0 focus:outline-none"
                type="checkbox"
              />

              <label for="is_for_sale" class="text-gray-100"> For sale </label>
            </div>
          </li>
          <li>
            <div class="form-group">
              <input
                id="has_fontanel"
                v-model="formData.has_fontanel"
                class="mb-px focus:ring-0 focus:outline-none"
                type="checkbox"
              />

              <label for="has_fontanel" class="text-gray-100">
                Has fontanel
              </label>
            </div>
          </li>
          <li>
            <div class="form-group">
              <input
                id="is_open_for_breeding"
                v-model="formData.is_open_for_breeding"
                class="mb-px focus:ring-0 focus:outline-none"
                type="checkbox"
              />

              <label for="is_open_for_breeding" class="text-gray-100">
                Open for breeding
              </label>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <!-- Submit -->
    <div class="form-section form-section--block">
      <button type="submit" class="btn btn-next">Next</button>
    </div>
  </form>
</template>

<script>
import useValidate from '@vuelidate/core';
import { required } from '@vuelidate/validators';

export default {
  name: 'InfoForm',
  inject: ['csrf'],
  emits: ['info-ready'],
  data() {
    return {
      v$: useValidate(),
      formData: {
        name: '',
        color: '',
        height: '',
        teeth: '',
        birthday: '',
        titles: '',
        father: '',
        mother: '',
        owner: '',
        breeder: '',
        age: 'puppy',
        is_male: true,
        is_for_sale: false,
        has_fontanel: false,
        is_open_for_breeding: false,
      },
    };
  },
  validations() {
    return {
      formData: {
        name: { required },
        color: { required },
        height: { required },
        teeth: { required },
        birthday: { required },
        titles: { required },
        age: { required },
        is_male: { required },
        is_for_sale: { required },
        has_fontanel: { required },
        is_open_for_breeding: { required },
      },
    };
  },
  methods: {
    createPom() {
      this.v$.$validate();

      if (this.v$.$errors.length) {
        console.log(this.v$.$errors);

        // TODO: show alert
        return console.log('Пожалуйста заполните все обязательные поля.');
      }

      this.$emit('info-ready', this.formData);
    },
  },
};
</script>

<style lang="scss" scoped></style>
