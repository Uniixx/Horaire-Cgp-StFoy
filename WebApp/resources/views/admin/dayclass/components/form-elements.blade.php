<div class="form-group row align-items-center" :class="{'has-danger': errors.has('horaireID'), 'has-success': fields.horaireID && fields.horaireID.valid }">
    <label for="horaireID" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.dayclass.columns.horaireID') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.horaireID" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('horaireID'), 'form-control-success': fields.horaireID && fields.horaireID.valid}" id="horaireID" name="horaireID" placeholder="{{ trans('admin.dayclass.columns.horaireID') }}">
        <div v-if="errors.has('horaireID')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('horaireID') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.dayclass.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.dayclass.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('teacher'), 'has-success': fields.teacher && fields.teacher.valid }">
    <label for="teacher" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.dayclass.columns.teacher') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.teacher" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('teacher'), 'form-control-success': fields.teacher && fields.teacher.valid}" id="teacher" name="teacher" placeholder="{{ trans('admin.dayclass.columns.teacher') }}">
        <div v-if="errors.has('teacher')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('teacher') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('room'), 'has-success': fields.room && fields.room.valid }">
    <label for="room" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.dayclass.columns.room') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.room" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('room'), 'form-control-success': fields.room && fields.room.valid}" id="room" name="room" placeholder="{{ trans('admin.dayclass.columns.room') }}">
        <div v-if="errors.has('room')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('room') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('startingTime'), 'has-success': fields.startingTime && fields.startingTime.valid }">
    <label for="startingTime" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.dayclass.columns.startingTime') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.startingTime" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('startingTime'), 'form-control-success': fields.startingTime && fields.startingTime.valid}" id="startingTime" name="startingTime" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('startingTime')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('startingTime') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('endingTime'), 'has-success': fields.endingTime && fields.endingTime.valid }">
    <label for="endingTime" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.dayclass.columns.endingTime') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.endingTime" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('endingTime'), 'form-control-success': fields.endingTime && fields.endingTime.valid}" id="endingTime" name="endingTime" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('endingTime')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('endingTime') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('suffix'), 'has-success': fields.suffix && fields.suffix.valid }">
    <label for="suffix" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.dayclass.columns.suffix') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.suffix" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('suffix'), 'form-control-success': fields.suffix && fields.suffix.valid}" id="suffix" name="suffix" placeholder="{{ trans('admin.dayclass.columns.suffix') }}">
        <div v-if="errors.has('suffix')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('suffix') }}</div>
    </div>
</div>


