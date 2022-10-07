import React, { Component } from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import {
    Card,
    CardContent,
    CardHeader,
    Typography,
    Snackbar,
    Button,
} from "@mui/material";
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend,
} from "chart.js";
import { Bar } from "react-chartjs-2";
import { faker } from "@faker-js/faker";
import dayjs from "dayjs";
import customParseFormat from "dayjs/plugin/customParseFormat";
import { isMobile } from "react-device-detect";
import "dayjs/locale/id";
dayjs.extend(customParseFormat);
dayjs.locale("id");

ChartJS.register(
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend
);

class Statis extends Component {
    state = {};
    componentDidMount = () => {};
    render() {
        const {} = this.state;

        const labels = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
        ];
        const options = {
            responsive: true,
            plugins: {
                legend: {
                    position: "top",
                },
                title: {
                    display: true,
                    text: "Productivity",
                },
            },
        };
        const data = {
            labels,
            datasets: [
                {
                    label: "KAPAL ABE",
                    data: labels.map(() =>
                        faker.datatype.number({ min: 0, max: 1000 })
                    ),
                    backgroundColor: "rgba(255, 99, 132, 0.5)",
                },
                {
                    label: "KAPAL PERNIKA",
                    data: labels.map(() =>
                        faker.datatype.number({ min: 0, max: 1000 })
                    ),
                    backgroundColor: "rgba(53, 162, 235, 0.5)",
                },
            ],
        };
        return (
            <>
                <div class="container">
                    <Bar
                        options={options}
                        data={data}
                        // height={isMobile ? 355 : "230rem"}
                    />
                </div>
            </>
        );
    }
}
export default Statis;

if (document.getElementById("statistics")) {
    ReactDOM.render(<Statis />, document.getElementById("statistics"));
}
