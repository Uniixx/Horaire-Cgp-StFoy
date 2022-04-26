<div class="form-group row align-items-center" :class="{'has-danger': errors.has('guildId'), 'has-success': fields.guildId && fields.guildId.valid }">
    <label for="guildId" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.horaire.columns.guildId') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.guildId" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('guildId'), 'form-control-success': fields.guildId && fields.guildId.valid}" id="guildId" name="guildId" placeholder="{{ trans('admin.horaire.columns.guildId') }}">
        <div v-if="errors.has('guildId')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('guildId') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('day'), 'has-success': fields.day && fields.day.valid }">
    <label for="day" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.horaire.columns.day') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.day" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('day'), 'form-control-success': fields.day && fields.day.valid}" id="day" name="day" placeholder="{{ trans('admin.horaire.columns.day') }}">
        <div v-if="errors.has('day')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('day') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('month'), 'has-success': fields.month && fields.month.valid }">
    <label for="month" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.horaire.columns.month') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.month" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('month'), 'form-control-success': fields.month && fields.month.valid}" id="month" name="month" placeholder="{{ trans('admin.horaire.columns.month') }}">
        <div v-if="errors.has('month')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('month') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('year'), 'has-success': fields.year && fields.year.valid }">
    <label for="year" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.horaire.columns.year') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.year" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('year'), 'form-control-success': fields.year && fields.year.valid}" id="year" name="year" placeholder="{{ trans('admin.horaire.columns.year') }}">
        <div v-if="errors.has('year')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('year') }}</div>
    </div>
</div>


