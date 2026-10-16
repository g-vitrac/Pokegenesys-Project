import { Controller } from '@hotwired/stimulus';
import DataTable from 'datatables.net-dt';

export default class extends Controller {

    connect() {
        const table = new DataTable('#pokelist-table',{
            
        })
    }
}
