<?php
 
namespace App\Http\Controllers;
 
use App\Models\OrdersModuleModel;
use Illuminate\Http\Request;
use App\Services\Midtrans\CallbackService;
 
class PaymentCallbackController extends Controller
{
    public function receive()
    {
        $callback = new CallbackService;

        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $order = $callback->getOrder();

            if ($callback->isSuccess()) {
                OrdersModuleModel::where('id', $order->id)->update([
                    'payment_status' => 2,
                ]);
            }

            if ($callback->isExpire()) {
                OrdersModuleModel::where('id', $order->id)->update([
                    'payment_status' => 3,
                ]);
            }

            if ($callback->isCancelled()) {
                OrdersModuleModel::where('id', $order->id)->update([
                    'payment_status' => 4,
                ]);
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notification successfully processed',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key not verified',
                ], 403);
        }
    }
}