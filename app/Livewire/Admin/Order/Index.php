<?php

namespace App\Livewire\Admin\Order;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use App\Events\OrderUpdated;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $selectedOrder = null;
    public $showOrderDetails = false;
    public $showUpdateStatus = false;
    public $newStatus = '';

    protected $listeners = [
        'refreshOrders' => '$refresh',
        'orderStatusUpdated' => '$refresh',
        'orderCancelled' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function viewOrderDetails($orderId)
    {
        $this->selectedOrder = Order::with(['items', 'user'])->find($orderId);
        $this->showOrderDetails = true;
    }

    public function closeOrderDetails()
    {
        $this->showOrderDetails = false;
        $this->selectedOrder = null;
    }

    public function showUpdateStatusModal($orderId)
    {
        $this->selectedOrder = Order::find($orderId);
        if ($this->selectedOrder) {
            $this->newStatus = $this->selectedOrder->status;
            $this->showUpdateStatus = true;
        }
    }

    public function closeUpdateStatus()
    {
        $this->showUpdateStatus = false;
        $this->selectedOrder = null;
        $this->newStatus = '';
    }

    public function updateOrderStatus()
    {
        $this->validate([
            'newStatus' => 'required|in:pending,confirmed,shipped,completed,cancelled'
        ]);

        if (!$this->selectedOrder) {
            session()->flash('error', 'Không tìm thấy đơn hàng.');
            return;
        }

        $this->selectedOrder->update([
            'status' => $this->newStatus
        ]);

        // Gửi event broadcast trước khi reset selectedOrder
        event(new OrderUpdated($this->selectedOrder));

        $this->dispatch('orderStatusUpdated', orderId: $this->selectedOrder->id, status: $this->newStatus);
        $this->closeUpdateStatus();
        session()->flash('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }

    public function getStatusBadgeClass($status)
    {
        return match($status) {
            'pending' => 'bg-yellow-100 text-yellow-800',
            'confirmed' => 'bg-blue-100 text-blue-800',
            'shipped' => 'bg-purple-100 text-purple-800',
            'completed' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    public function getStatusText($status)
    {
        return match($status) {
            'pending' => 'Chờ xác nhận',
            'confirmed' => 'Đã xác nhận',
            'shipped' => 'Đang giao hàng',
            'completed' => 'Đã hoàn thành',
            'cancelled' => 'Đã hủy',
            default => 'Không xác định',
        };
    }

    public function render()
    {
        $orders = Order::query()
            ->when($this->search, function($query) {
                $query->where(function($q) {
                    $q->where('code', 'like', '%' . $this->search . '%')
                        ->orWhere('receiver_name', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->status, function($query) {
                $query->where('status', $this->status);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.order.index', [
            'orders' => $orders
        ]);
    }
}
