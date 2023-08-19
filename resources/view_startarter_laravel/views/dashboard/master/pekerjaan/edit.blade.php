@extends('layouts.dashboard_modul')
@section('content')
<div class="uk-flex-center" data-uk-grid>
    <div class="uk-width-3-4@l">
        <div class="uk-card">
            <div class="uk-card-header sc-padding">
                <div class="uk-flex uk-flex-middle">
                    <div>
                        <span data-uk-icon="icon:home;ratio:1.4" class="uk-margin-medium-right"></span>
                    </div>
                    <h3 class="uk-card-title">
                        Edit Master Pekerjaan
                    </h3>
                    <div class="uk-width-auto@s" style="padding-left:350px;">
                        <div id="sc-dt-buttons">
                            <div class="dt-buttons">
                                <a class="dt-button buttons-copy buttons-html5 sc-button" href="{{route('dashboard.master.pekerjaan.index')}}" ><span data-uk-icon="icon: menu"></span> <span>List Master Pekerjaan</span></a>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="uk-card-body" >
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="uk-alert-danger" data-uk-alert>
                            <a class="uk-alert-close" data-uk-close></a>
                            {{ $error }}
                        </div>
                    @endforeach
                    
                @endif
                <form method="POST" id="form_advanced_validation" class="form-edit-pekerjaan" action="{{route('dashboard.master.pekerjaan.update',['id'=>$data->id])}}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="put" />
                    @include('dashboard.master.pekerjaan.form_edit')
                    <div class="uk-margin-top">
                        <button type="submit" class="sc-button sc-button-primary sc-button-large">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
</script>
<script>
flatpickr(".flatpickr-input");
let current = new Date(); //'Mar 11 2015' current.getTime() = 1426060964567
let followingDay = new Date(current.getTime() + 86400000); // + 1
flatpickr(".periode-banner",{
    mode: "range",
    dateFormat: "Y-m-d",
    //defaultDate: [current, followingDay],
    onChange: function(selectedDates, dateStr, instance) {
       
    },
    onClose: function(selectedDates, dateStr, instance){
      
       let arrDate=dateStr.split(" to ");
       let start = document.getElementById("start_date_banner");
       start.value = arrDate[0];
       let end = document.getElementById("end_date_banner");
       end.value = arrDate[1];

    }
});
new Vue({
            el: '#vue-form-element',
            data:{
                textAlert: '',
                endOfDiv : '</div>',
                alertFormat:{
                    success :  '<div class="uk-alert-success" data-uk-alert>'+
                                '<a class="uk-alert-close" data-uk-close></a>' ,
                    warning :  '<div class="uk-alert-warning" data-uk-alert>'+
                                '<a class="uk-alert-close" data-uk-close></a>' ,
                    danger  :  '<div class="uk-alert-danger" data-uk-alert>'+
                                '<a class="uk-alert-close" data-uk-close></a>' ,
                    primary :   '<div class="uk-alert-primary" data-uk-alert>'+
                                '<a class="uk-alert-close" data-uk-close></a>' 
                }
               
            },
            watch:{
               
            },
            methods:{
               
                selectedTipePotongan:function(event){
                    selectTipePotongan = event.target.value;
                    if(selectTipePotongan=="1" || selectTipePotongan==1){
                        $('.potongan').hide();
                        $('.potongan_flat').show();
                        document.getElementById("potongan_flat").value=null;
                    }
                    if(selectTipePotongan=="0" || selectTipePotongan==0){
                        $('.potongan').show();
                        $('.potongan_flat').hide();
                        document.getElementById("potongan").value=null;
                    }
                   
                    
                    
                   

                }
                

                
            },
            computed:{
               
            },
            mounted() {

                selectTipePotongan = "{{$data->is_potongan_flat}}";
                if(selectTipePotongan=="1" || selectTipePotongan==1){
                    $('.potongan').hide();
                    $('.potongan_flat').show();
                   
                }
                if(selectTipePotongan=="0" || selectTipePotongan==0){
                    $('.potongan').show();
                    $('.potongan_flat').hide();
                   
                }
                 
            
            },
        });
</script>
@endpush
@endsection