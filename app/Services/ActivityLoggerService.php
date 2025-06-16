<?php
namespace App\Services;

use DeviceDetector\DeviceDetector;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ActivityLoggerService
{
    /* public function login(): void
    {
        if (!session()->has('login_activity_logged')) {
            $user = Auth::user();
            activity('auth')
                ->event('login')
                ->causedBy($user)
                ->withProperties($this->getDeviceDetails(request()))
                ->log($user->name . ' ha iniciado sesión');
            session()->put('login_activity_logged', true); 
        }
    } */

    /* public function unauthorized(Request $request, ?User $user): void
    {
        $path = app(WordFormatterService::class)->formatPath($request->getPathInfo());
        $message = "Intento de acceso no autorizado en el panel de $path";
        if ($user === null) {
            activity('alert')
                ->event('unauthorized')
                ->withProperties($this->getDeviceDetails($request))
                ->log($message);
        } else {
            activity('suspicious')
                ->event('unauthorized')
                ->causedBy($user)
                ->withProperties($this->getDeviceDetails($request))
                ->log($message);
        }
    } */

    public function default(string $event, string $message, Model $model): void
    {
        $user = Auth::user();
        $oldValues = [];
        if ($event === 'updated') {
            $oldValues = array_intersect_key(
                $model->getOriginal(), 
                $model->getChanges()
            );
        }
        activity('default')
            ->performedOn($model)
            ->event($event)
            ->causedBy($user)
            ->withProperties([
                'attributes' => $model->getAttributes(),
                'old' => $oldValues,
                'device' => $this->getDeviceDetails(),
            ])
            ->log($message);
    }

    protected function getDeviceDetails(): array
    {
        $dd = new DeviceDetector(request()->userAgent());
        $dd->skipBotDetection();
        $dd->parse();
        return [
            'ip' => request()->ip(),
            'user_agent' => $dd->getUserAgent(),
            'device_name' => $dd->getDeviceName(),
            'brand' => $dd->getBrandName(),
            'model' => $dd->getModel(),
            'os' => $dd->getOs(),
            'client' => $dd->getClient(),
        ];
    }
}
