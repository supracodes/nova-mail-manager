<?phpnamespace App\Models\Campaign;use Illuminate\Database\Eloquent\Factories\HasFactory;use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\SoftDeletes;class Subject extends Model{    use SoftDeletes, HasFactory;    protected $fillable = [        'value',        'sent_count',    ];}