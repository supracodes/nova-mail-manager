<?phpnamespace App\Nova\Resources\Campaign;use App\Models\Campaign\Content;use App\Nova\Resource;use Illuminate\Http\Request;use InteractionDesignFoundation\NovaHtmlCodeField\HtmlCode;use Laravel\Nova\Fields\Code;use Laravel\Nova\Fields\ID;use Laravel\Nova\Fields\Number;use Laravel\Nova\Fields\Text;use Laravel\Nova\Fields\Textarea;use Laravel\Nova\Fields\Trix;class ContentResource extends Resource{    public static string $model = Content::class;    public static $title = 'id';    public static $search = [        'id'    ];    public static $group = 'Campaign';    public function fields(Request $request): array    {        return [            ID::make()                ->hide()                ->sortable(),            Text::make(null)                ->onlyOnForms()                ->asHtml()                ->withMeta([                    'extraAttributes' => [                        'style' => 'display: none;'                    ]                ])                ->help("<pre>".Resource::hintsText()."</pre>"),            Code::make('Html')                ->fullWidth()                ->hideFromIndex()                ->sortable()                ->rules('nullable'),            Text::make('Text')                ->onlyOnIndex()                ->displayUsing(fn ($text) => strlen($text) <= 50 ? $text : substr($text, 0, 50) . '...')                ->sortable()                ->rules('nullable'),            Textarea::make('Text')                ->displayUsing(fn ($text) => strlen($text) <= 50 ? $text : substr($text, 0, 50) . '...')                ->sortable()                ->rules('nullable'),            Number::make('Sent Count')                ->hideWhenCreating()                ->default(0)                ->sortable()                ->rules('integer'),        ];    }    public function cards(Request $request): array    {        return [];    }    public function filters(Request $request): array    {        return [];    }    public function lenses(Request $request): array    {        return [];    }    public function actions(Request $request): array    {        return [];    }    public static function label(): string    {        return 'Contents';    }}