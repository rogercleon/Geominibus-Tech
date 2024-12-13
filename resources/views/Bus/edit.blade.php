@extends('adminlte::page')

@section('title', 'Sistema de Monitoreo "Security Bus"')

@section('content_header')
    <!--<h1>Videojuegos</h1>-->
@stop

@section('content')
@inject('agencias','App\Services\Agencias')
    <h2>Actualizacion de Buses</h2>
    <form action="/Bus/{{$bus->id}}" method="POST"><br>
        @csrf
        @method('put')
        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Numero de Bus:') }}</label>
            <div class="col-sm-7">
                <div class="form-group{{ $errors->has('Num_Bus') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('Num_Bus') ? ' is-invalid' : '' }}" name="Num_Bus" id="input-Num_Bus" type="number" placeholder="{{ __('Numero de Bus') }}" value="{{$bus->Num_Bus}}" required="true" aria-required="true" />
                    @if ($errors->has('Num_Bus'))
                    <span id="Num_Bus-error" class="error text-danger" for="input-Num_Bus">{{ $errors->first('Num_Bus')}}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Agencia: ')}}"{{$bus->id_agencia}}"</label>
            <div class="col-sm-7">
                <div class="form-group{{ $errors->has('id_agencia') ? ' has-danger' : '' }}">
                <select name="id_agencia" id="id_agencia" class="form-control{{ $errors->has('id_agencia') ? ' is-invalid' : '' }}">
                    @foreach($agencias->get() as $index=>$agencia)
                    <option value="{{$index}}" {{old('id_agencia') == $index ? 'selected' : ''}}>
                        {{$agencia}}
                    </option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Numero de Asientos:') }}</label>
            <div class="col-sm-7">
                <div class="form-group{{ $errors->has('Num_Asiento') ? ' has-danger' : '' }}">
                    <select name="Num_Asiento" id="Num_Asiento" style="width: 100px; text-align: center;">
                        <option value="{{$bus->Num_Asiento}}">{{$bus->Num_Asiento}}</option>
                        <option value="40">40</option><option value="41">41</option>
                        <option value="42">42</option><option value="43">43</option>
                        <option value="44">44</option><option value="45">45</option>
                        <option value="46">46</option><option value="47">47</option>
                        <option value="48">48</option><option value="49">49</option>
                        <option value="50">50</option><option value="51">51</option>
                        <option value="52">52</option><option value="53">53</option>
                        <option value="54">54</option><option value="55">55</option>
                        <option value="56">56</option><option value="57">57</option>
                        <option value="58">58</option><option value="59">59</option>
                        <option value="60">60</option><option value="61">61</option>
                        <option value="62">62</option><option value="63">63</option>
                        <option value="64">64</option><option value="65">65</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="container">
            <a href="/Bus" class="btn btn-warning" style="margin-left: 590px" tabindex="4">CANCELAR</a>
            <button type="submit" class="btn btn-success" style="margin-left: 15px" tabindex="5">GUARDAR</button>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
