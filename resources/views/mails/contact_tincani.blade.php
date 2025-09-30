@foreach($fields as $name=>$val)
    {{__('mails.to.tincani.fields.'.$name).$val}} <br>
@endforeach