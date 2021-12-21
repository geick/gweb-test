<div class="optional-field-template">
    <h4>Optionales Feld <span class="optional-field-index">1</span></h4>

    <div class="optional-field-wrapper">
        <div>
            {!! Form::label('field-name', 'Feldname') !!}
            {!! Form::text('field-name') !!}
        </div>
        <div>
            {!! Form::label('field-values', 'erlaubte Feldwerte') !!}
            {!! Form::textarea('field-values', '', ['rows' => 4]) !!}
        </div>
    </div>
</div>