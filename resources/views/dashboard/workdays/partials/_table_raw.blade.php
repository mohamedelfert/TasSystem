<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! (app()->getLocale() == 'ar') ? $workday->getTranslation('day', 'ar') : $workday->getTranslation('day', 'en') !!}</td>
</tr>

