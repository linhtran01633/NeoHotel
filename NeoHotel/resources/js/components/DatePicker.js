import React, { useState, useEffect, useRef } from 'react';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';

const DatePicker = () => {
    const [selectedDate, setSelectedDate] = useState(null);
    const flatpickrRef = useRef(null);

    useEffect(() => {
        flatpickr(flatpickrRef.current, {
            dateFormat: 'Y-m-d',
            onChange: (selectedDates) => {
                setSelectedDate(selectedDates[0]);
            },
        });
    }, []);

    return (
        <div>
            <input
                ref={flatpickrRef}
                type="text"
                placeholder="Select date"
                className="form-control"
            />
            <p>Selected Date: {selectedDate ? selectedDate.toLocaleDateString() : 'None'}</p>
        </div>
    );
};

export default DatePicker;
