class OrderStatus{
    static getOrderStatus()
    {
        return [{order: {
            OrderID: 1,
            UserID: 1,
            FamilySize: 3,
            Status: "Open",
            Location: 65804,
            PickupLocation: "Krogers on S. Glenstone"
        }

        }];
    }  
}

export default OrderStatus;