@component('mail::message')




# Pendaftaran Kartu Kesehatan

Perusahaan kami tepatnya berdiri tanggal 19 Desember 1995 sesuai dengan Akte Pendirian No. 49 yang sudah disahkan oleh Notaris Tjia Fransisca Teresa Nilawati SH. dan mulai beroperasi pada tahun 1996


@component('mail::panel')



Perusahaan kami tepatnya berdiri tanggal 19 Desember 1995 sesuai dengan Akte Pendirian No. 49 yang sudah disahkan oleh Notaris Tjia Fransisca Teresa Nilawati SH. dan mulai beroperasi pada tahun 1996

@endcomponent



@component('mail::table')
||| &nbsp; &nbsp; | &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;|
|:-| :-- |:--|:--|
@foreach ($pageMenus as $pageMenu)
| Title directory|`{{$pageMenu->title}}`| | |
@endforeach
@endcomponent



@component('mail::panel')



Perusahaan kami tepatnya berdiri tanggal 19 Desember 1995 sesuai dengan Akte Pendirian No. 49 yang sudah disahkan oleh Notaris Tjia Fransisca Teresa Nilawati SH. dan mulai beroperasi pada tahun 1996

@endcomponent

@component('mail::table')
| id | title | directory | module |
| :------------- |:-------------| :---------| :--------|
@foreach ($pageMenus as $pageMenu)
| {{$pageMenu->id}} | {{$pageMenu->title}} | `{{$pageMenu->page_directory}}`|{{$pageMenu->module}} |
@endforeach
@endcomponent





<div style="display:flex">
    @component('mail::button', ['url' => $url,'color'=>"green"])
    Terima
    @endcomponent
    @component('mail::button', ['url' => $url,"color"=>"red"])
    Tolak
    @endcomponent
    @component('mail::button', ['url' => $url])
    Bubar
    @endcomponent
</div>

<br />
<br />
<br />
<br />






@endcomponent