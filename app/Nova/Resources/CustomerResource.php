<?phpnamespace App\Nova\Resources;use App\Models\Customer;use App\Nova\Resource;use Illuminate\Http\Request;use Laravel\Nova\Fields\ID;use Laravel\Nova\Fields\Number;use Laravel\Nova\Fields\Text;class CustomerResource extends Resource{    public static string $model = Customer::class;    public static $title = 'name';    public static $search = [        'name',        'email',        'phone'    ];    public function fields(Request $request): array    {        return [            ID::make()                ->hide()                ->sortable(),            Text::make('Name')                ->sortable()                ->rules('nullable'),            Text::make('Email')                ->sortable()                ->rules('nullable', 'email', 'max:254'),            Text::make('Phone')                ->sortable()                ->rules('nullable'),            Number::make('Sent Count')                ->hideWhenCreating()                ->default(0)                ->sortable()                ->rules('integer'),        ];    }    public function cards(Request $request): array    {        return [];    }    public function filters(Request $request): array    {        return [];    }    public function lenses(Request $request): array    {        return [];    }    public function actions(Request $request): array    {        return [];    }    public static function label(): string    {        return 'Customer';    }}