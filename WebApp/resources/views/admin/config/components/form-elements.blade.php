<div class="form-group row align-items-center" :class="{'has-danger': errors.has('guildId'), 'has-success': fields.guildId && fields.guildId.valid }">
    <label for="guildId" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.config.columns.guildId') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.guildId" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('guildId'), 'form-control-success': fields.guildId && fields.guildId.valid}" id="guildId" name="guildId" placeholder="{{ trans('admin.config.columns.guildId') }}">
        <div v-if="errors.has('guildId')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('guildId') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('prefix'), 'has-success': fields.prefix && fields.prefix.valid }">
    <label for="prefix" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.config.columns.prefix') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.prefix" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('prefix'), 'form-control-success': fields.prefix && fields.prefix.valid}" id="prefix" name="prefix" placeholder="{{ trans('admin.config.columns.prefix') }}">
        <div v-if="errors.has('prefix')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('prefix') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('welcomechannel'), 'has-success': fields.welcomechannel && fields.welcomechannel.valid }">
    <label for="welcomechannel" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.config.columns.welcomechannel') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.welcomechannel" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('welcomechannel'), 'form-control-success': fields.welcomechannel && fields.welcomechannel.valid}" id="welcomechannel" name="welcomechannel" placeholder="{{ trans('admin.config.columns.welcomechannel') }}">
        <div v-if="errors.has('welcomechannel')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('welcomechannel') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('logchannel'), 'has-success': fields.logchannel && fields.logchannel.valid }">
    <label for="logchannel" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.config.columns.logchannel') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.logchannel" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('logchannel'), 'form-control-success': fields.logchannel && fields.logchannel.valid}" id="logchannel" name="logchannel" placeholder="{{ trans('admin.config.columns.logchannel') }}">
        <div v-if="errors.has('logchannel')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('logchannel') }}</div>
    </div>
</div>
